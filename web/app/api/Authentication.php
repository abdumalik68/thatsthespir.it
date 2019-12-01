<?php

/**
 * Auth : Taking care of Single Sign-on (powered by HybridAuth)
 *
 */
//Import Hybridauth's namespace
use Hybridauth\Hybridauth;
use Hybridauth\Exception\Exception;
use Hybridauth\Storage\Session;

class Authentication
{
    public $db;
    public $f3;
    public $provider;

    function __construct(\Base $f3)
    {
        global $db;
        $this->db = $db;
        $this->f3 = $f3;
        if ($f3->exists('PARAMS.action')) {
            $this->provider = $f3->get('PARAMS.action');
        }
    }

    function try(\Base $f3, $params)
    {
        /**
         * Try authenticating the user via SSO
         */


        try {

            $storage = new Session();
            $hybridauth = new Hybridauth($this->get_config());
            /**
             * Hold information about provider when user clicks on Sign In.
             */
            if (!empty($this->provider)) {
                $storage->set('provider', $this->provider);
            }
            /**
             * When provider exists in the storage, try to authenticate user and clear storage.
             *
             * When invoked, `authenticate()` will redirect users to provider login page where they
             * will be asked to grant access to your application. If they do, provider will redirect
             * the users back to Authorization callback URL (i.e., this script).
             */
            if ($provider = $storage->get('provider')) {
                $hybridauth->authenticate($provider);
                // user authenticated, clear the storage.
                $storage->set('provider', null);
                // then grab the user profile
                $user_profile = $hybridauth->getUserProfile();

                // Find user in our Database...
                $user = new DB\SQL\Mapper($this->db, 'users');
                $user->load(array('email = :username LIMIT 0,1', ':username' => trim($user_profile->email)));
                $new = false;
                if ($user->dry()) {
                    // No existing user, let's create it...
                    $user->role = 'subscriber';
                    $user->created = date('Y-m-d H:i:s');
                    $new = true;
                }
                $user->fullname = (!empty($user_profile->displayName)) ? $user_profile->displayName : preg_replace('/([^@]*).*/', '$1', $user->email);
                $user->email = (!empty($username)) ? trim($user_profile->email) : $user->fullname;
                $username = $user->email;
                $user->image = $user_profile->photoURL;
                $user->password = $this->provider;
                $user->save();

                if ($new) {
                    // Email to admin
                    $smtp = new SMTP($f3->SMTP_HOST, $f3->SMTP_PORT, $f3->SMTP_PROTOCOL, $f3->SMTP_USER, $f3->SMTP_PASSWORD);

                    $smtp->set('From', '"pixeline" <alexandre@pixeline.be>');
                    $smtp->set('To', '<aplennevaux@gmail.com>');
                    $smtp->set('Subject', "That's The Spirit: New user registration!");
                    $smtp->set('Errors-to', '<alexandre@pixeline.be>');

                    $message = 'On ' . date('d.m.Y at H:i:s') . ', a new user registered, kind master.' . "\n---\n";
                    $message .= "email: " . $user->email . "\nname:" . $user->fullname;
                    $message .= "\n---\nSee you,\n\nThe Spirit.";
                    $sent = $smtp->send($message, true);
                }

                $f3->set('SESSION.logged_in', 'ok');
                $_SESSION['logged_in'] = 'ok';

                $_SESSION['user'] = array('id' => $user->id, 'email' => $user->email, 'fullname' => $user->fullname, 'role' => $user->role, 'image' => $user->image, 'urls' => json_decode($user->urls));

                if (!empty($f3->get('SESSION.next_action'))) {

                    switch ($f3->get('SESSION.next_action')) {

                        case 'like':

                            $fav = new DB\SQL\Mapper($this->db, 'favourites');
                            $fav->quote_id = $f3->get('SESSION.quote_id');
                            $fav->user_email = $username;
                            $fav->save();

                            $f3->set('SESSION.goto', '/quote/view/' . $f3->get('SESSION.quote_id'));

                            break;
                    }
                    $f3->clear('SESSION.next_action');
                    $f3->clear('SESSION.quote_id');
                }

                if (!empty($f3->get('SESSION.goto'))) {
                    $f3->reroute($f3->get('SESSION.goto'));
                    $f3->clear('SESSION.goto');
                } else {
                    $f3->reroute('/');
                }
            }

            /**
             * This will erase the current user authentication data from session, and any further
             * attempt to communicate with provider.
             */
            if (isset($_GET['logout'])) {
                $adapter = $hybridauth->getAdapter($_GET['logout']);
                $adapter->disconnect();
            }
        } catch (Exception $e) {

            pr($e->getMessage());
            pr($params);
            pr($_GET);
            exit;
            /** SSO did not work out... */

            $smtp = new SMTP($f3->SMTP_HOST, $f3->SMTP_PORT, $f3->SMTP_PROTOCOL, $f3->SMTP_USER, $f3->SMTP_PASSWORD);

            $smtp->set('From', '"pixeline" <alexandre@pixeline.be>');
            $smtp->set('To', '<aplennevaux@gmail.com>');
            $smtp->set('Subject', "That's The Spirit: User opauth Error! ");
            $smtp->set('Errors-to', '<alexandre@pixeline.be>');

            $message = 'On ' . date('d.m.Y at H:i:s') . ', an error occured:.' . "\n---\n";
            $message .= "email: " . $user->email . "\nname:" . $user->fullname . "<pre>";
            $message .= print_r($e, true);
            $message .= "<br>\n---\nSee you,\n\nThe Spirit.";
            $sent = $smtp->send($message, true);
        }
    }



    function get_config()
    {
        return array(
            'callback' => WWWROOT . '/auth',
            "path_vendor" => 'vendor',
            "providers" => array(
                "Google" => array(
                    "enabled" => true,
                    "keys" => array("id" => '673306183223-0ft3a8jd9icav8l0ida4rhtg0vn847g3.apps.googleusercontent.com', "secret" => 'ArQphOkW_M93XKWi0gWL6uRX'),
                    "access_type" => "online",
                    "scope" => 'https://www.googleapis.com/auth/userinfo.email',
                ),

                "Reddit" => array(
                    "enabled" => true,
                    "keys" => array("id" => "aSr9-PBrMgpBWA", "secret" => "bpDpDGzPOYnEHIwH_vkjV92-BQI"),
                    "scope" => "identity",
                    "trustForwarded" => false,
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "4GPxkkexLCBntwO9Lq879H9SD", "secret" => "flkYZYLTJLEo5nofHj98ClejMqjXeiFJZ1wuHOgxSKq08yfMIa"),
                    "includeEmail" => true,
                ),
                'GitHub' => array(
                    "enabled" => true,
                    "scope" => "user:email",
                    "keys" => ["id" => "44ccee421e44fbee93ce", "secret" => "d577497f887b5002e146ef03c14636b7113967b3"],
                    "wrapper" => array(
                        "class" => 'Hybrid_Providers_GitHub',
                        "path" => APP_PATH . '/vendor/hybridauth/hybridauth/additional-providers/hybridauth-github/Providers/GitHub.php',

                    ),
                ),
            ),
            // If you want to enable logging, set 'debug_mode' to true.
            // You can also set it to
            // - "error" To log only error messages. Useful in production
            // - "info" To log info and error messages (ignore debug messages)
            "debug_mode" => true,
            // Path to file writable by the web server. Required if 'debug_mode' is not false
            'debug_file' => __FILE__ . '.log',
        );
    }
}
