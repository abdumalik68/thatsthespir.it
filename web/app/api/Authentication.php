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

    function __construct()
    {
        global $db;
        $this->db = $db;
    }

    function try(\Base $f3)
    {
        /**
         * Try authenticating the user via SSO
         */
        if ($f3->exists('GET.provider')) {
            $provider = $f3->get('GET.provider');
        }
        try {
            $hybridauth = new Hybridauth($this->get_config());
            $storage = new Session();
            /**
             * Hold information about provider when user clicks on Sign In.
             */
            if (!empty($provider)) {
                $storage->set('provider', $provider);
            }
            /**
             * When provider exists in the storage, try to authenticate user and clear storage.
             *
             * When invoked, `authenticate()` will redirect users to provider login page where they
             * will be asked to grant access to your application. If they do, provider will redirect
             * the users back to Authorization callback URL (i.e., this script).
             */
            if ($provider = $storage->get('provider')) {

                $adapter = $hybridauth->authenticate($provider);

                // then grab the user profile
                $user_profile = $adapter->getUserProfile();
                // Find user in our Database...
                $user = new DB\SQL\Mapper($this->db, 'users');
                $user->load(array('email = :email LIMIT 0,1', ':email' => trim($user_profile->email)));
                $new = false;
                if ($user->dry()) {
                    // No existing user, let's create it...
                    $user->role = 'subscriber';
                    $user->created = date('Y-m-d H:i:s');
                    $new = true;
                }
                $username = preg_replace('/([^@]*).*/', '$1', $user->email);
                $user->fullname = (!empty($user_profile->displayName)) ? $user_profile->displayName : $username;
                $user->email = trim($user_profile->email);
                $user->image = $user_profile->photoURL;
                $user->password = $provider;
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
                    $smtp->send($message, true);
                }
                // user authenticated, clear the storage.
                $storage->set('provider', null);
                //Disconnect the adapter
                $adapter->disconnect();

                // Prepare exit...
                $f3->set('SESSION.logged_in', 'ok');
                $_SESSION['user'] = array('id' => $user->id, 'email' => $user->email, 'fullname' => $user->fullname, 'role' => $user->role, 'image' => $user->image, 'urls' => json_decode($user->urls));

                pr($_SESSION['user']);
                exit;

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
                    $goto = $f3->get('SESSION.goto');
                    $f3->clear('SESSION.goto');
                    $f3->reroute($goto);
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
            $smtp->send($message, true);
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
                    "keys" => ["id" => "44ccee421e44fbee93ce", "secret" => "d577497f887b5002e146ef03c14636b7113967b3"]
                ),
                'GitHub' => array(
                    // TEST FOR DEV
                    "enabled" => false,
                    "scope" => "user:email",
                    "keys" => ["id" => "e0deb927c89b1e103ed8", "secret" => "31da88034db46138852942c71ddcaef77939838b"]
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
