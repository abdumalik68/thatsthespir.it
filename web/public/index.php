<?php
//require 'vendor/autoload.php';
define('APP_PATH', '../app');

include APP_PATH . '/vendor/autoload.php';
include APP_PATH . '/functions.inc.php';

// Start FatFreeFramework
$f3 = Base::instance();

// Load configuration

$f3->config(APP_PATH . '/config.ini');
// Load additional configuration specific to the environment (dev or production)

switch ($_SERVER['HTTP_HOST']) {
    case 'thatsthespir.it':
        $config_file = '/config.production.ini';
        break;

    default:
        $config_file = '/config.dev.ini';
        break;
}
$f3->config(APP_PATH . $config_file);
define('WWWROOT', $f3->WWWROOT);
define('UPLOADS', $f3->UPLOADS);
define('ENV', $f3->ENV);

$f3->set('image_width', 100);


$db = new DB\SQL(
    'mysql:host=' . $f3->DB_HOST . ';port=3306;dbname=' . $f3->DB_NAME . ';charset=utf8',
    $f3->DB_USER,
    $f3->DB_PASSWORD
);

/*
CRON TASKS
Documentation: https://github.com/xfra35/f3-cron
 */

// $cron = Cron::instance();
// $cron->log = true;
// $cron->web = true;
// //$cron->set('reddit','Evangelist->reddit','*/5 * * * *');
// //$cron->set('reddit','Evangelist->reddit','@daily');
// $cron->set('twitter', 'Evangelist->twitter', '@daily');

// END CRON TASKS

$f3->set('upload_folder', $f3->get('UPLOADS'));
$f3->set('query', $f3->get('SESSION.query'));

if (!isset($_SESSION['used_quotes'])) {
    $_SESSION['used_quotes'] = array();
}

// LOGGED_IN: Convenience Constant to check whether user is logged in.
define('LOGGED_IN', ($f3->get('SESSION.logged_in') == 'ok'));
define('CURRENT_URI', $f3->get('PATH')); // ex: "/login" (mind the Slash!)

/*
STORE QUERY VARS IN SESSION FOR AFTER OPAUTH REDIRECT
 */

if ($f3->get('PARAMS.goto')) {
    $f3->set('SESSION.goto', $f3->get('PARAMS.goto'));
}

if (isset($_GET['next_action'])) {
    $f3->set('SESSION.next_action', $_GET['next_action']);
}
if (isset($_GET['quote_id'])) {
    $f3->set('SESSION.quote_id', $_GET['quote_id']);
}

/**  ALL ROUTES
 *
 * GET /                   : Web Service presentation
 * GET /quote/random       : random quote
 * GET /quote/{id}         : get specific quote
 * DELETE /quote/{id}      : delete specific quote
 * PUT /quote              : Add quote
 * GET /quote/favourites   : top 20
 * GET /author             : all authors
 * GET /author/{id}        : get specific author
 * DELETE /author/{id}     : delete specific author
 * PUT /author             : add author
 * GET /search/{string}    : search a quote or author
 * GET|POST /user/login    : user login
 * GET /user/logout        : user logout
 * GET|POST /quote/suggest : suggest a quote
 */

$f3->route('GET /', 'TheSpirit->get');
$f3->map('/quote/@item', 'Quote');
$f3->route('GET /quote/random', 'Quote->get_random');




$f3->run();
