<?php

ini_set('display_errors', 0);
error_reporting(E_WARNING | E_ERROR);
@session_start();

$config = APP_PATH . '/config.hybridauth' . ((ENV !== 'production') ? '.dev' : '') . '.php';

use Hybridauth\Exception\Exception;
use Hybridauth\Hybridauth;
use Hybridauth\Storage\Session;


global $db;
$provider = $f3->get('PARAMS.action');
pr($provider);
try {
    /**
     * Feed configuration array to Hybridauth.
     */
    $hybridauth = new Hybridauth($config);

    /**
     * Initialize session storage.
     */
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
        $storage->set('provider', null);

        // then grab the user profile
        $user_profile = $adapter->getUserProfile();

        $username = trim($user_profile->email);

        $user = new DB\SQL\Mapper($db, 'users');
        $user->load(array('email = :username LIMIT 0,1', ':username' => $username));
        $new = false;
        if ($user->dry()) {
            $user->role = 'subscriber';
            $user->created = date('Y-m-d H:i:s');
            $new = true;
        }
        $user->fullname = (!empty($user_profile->displayName)) ? $user_profile->displayName : preg_replace('/([^@]*).*/', '$1', $user->email);
        $user->email = (!empty($username)) ? $username : $user->fullname;
        $username = $user->email;
        $user->image = $user_profile->photoURL;
        $user->password = $provider;
        $user->save();
        $user = new DB\SQL\Mapper($db, 'users');
        $user->load(array('email = :username LIMIT 0,1', ':username' => $username));

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

                    $fav = new DB\SQL\Mapper($db, 'favourites');
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
    } else {
        die("missing provider: $provider");
    }

    /**
     * This will erase the current user authentication data from session, and any further
     * attempt to communicate with provider.
     */
    if (isset($_GET['logout'])) {
        $adapter = $hybridauth->getAdapter($_GET['logout']);
        $adapter->disconnect();
    }

    /**
     * Redirects user to home page (i.e., index.php in our case)
     */
} catch (Exception $e) {
    echo $e->getMessage();
}
