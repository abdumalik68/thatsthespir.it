<?php
//require 'vendor/autoload.php';
define('APP_PATH', '../app');


include APP_PATH . '/vendor/autoload.php';
include APP_PATH . '/functions.inc.php';


// Start FatFreeFramework
$f3 = Base::instance();

use Tracy\Debugger;

Debugger::$strictMode = false;
Debugger::enable($f3->ENV, dirname(__DIR__) . '/public/logs');


// Load configuration

$f3->config(APP_PATH . '/config.ini');
// Load additional configuration specific to the environment (dev or production)

switch ($_SERVER['HTTP_HOST']) {
    case 'api.thatsthespir.it':
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

// ERROR HANDLING
$f3->set('ONERROR', function () use ($f3) {
    Debugger::barDump($f3->get('ERROR'), 'ERROR');
    $e = $f3->get('EXCEPTION');
    // There isn't an exception when calling `Base->error()`.
    if (!$e instanceof Throwable) {
        $e = new Exception('HTTP ' . $f3->get('ERROR.code'));
    }
    Debugger::exceptionHandler($e);
});

$f3->set('upload_folder', $f3->get('UPLOADS'));


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
 * GET /quote/{slug}         : get specific quote
 * DELETE /quote/{slug}      : delete specific quote
 * PUT /quote/{slug}         : Edit specific quote
 * POST /quote             : Add quote
 * GET /quote/favourites   : top 20
 * GET /author             : all authors
 * GET /author/{slug}        : get specific author
 * DELETE /author/{slug}     : delete specific author
 * PUT /author             : add author
 * GET /search/{string}    : search a quote or author
 * GET|POST /user/login    : user login
 * GET /user/logout        : user logout
 */

// App-wide routes
$f3->route('GET /v1', 'TheSpirit->get', (int) $f3->STATIC_CACHE_EXPIRATION);
$f3->route('GET /rss', 'TheSpirit->get_rss_feed', (int) $f3->STATIC_CACHE_EXPIRATION);
$f3->route('GET /sitemap.xml', 'TheSpirit->get_xml_sitemap', (int) $f3->STATIC_CACHE_EXPIRATION);

// Content routes
$f3->map('/v1/quote/@slug', 'Quote', (int) $f3->STATIC_CACHE_EXPIRATION);
$f3->route('GET /v1/quote/random', 'Quote->get_random');
$f3->route('GET /v1/quote/random.xml', 'Quote->get_random');
$f3->map('/v1/author/@slug', 'Author', (int) $f3->STATIC_CACHE_EXPIRATION);
$f3->route('GET /v1/human-channels', 'Author->get_all_authors', (int) $f3->STATIC_CACHE_EXPIRATION);
$f3->route('GET /v1/quotes/search', 'Quotes->search');
$f3->route('GET /v1/quotes/fix-slugs', 'Quotes->fixSlugs');

// done, let's go!
$f3->run();
