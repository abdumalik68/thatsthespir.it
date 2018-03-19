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

$metatags = array(
    'title' => "That's the spirit!",
    'description' => 'Inspirational and motivational quotes for the creative soul.',
    'site_name' => 'That\'s The Spirit!',
    'image' => WWWROOT . '/assets/img/tts-og-image.jpg',
    'image:width' => 800,
    'image:height' => 574,
    'url' => WWWROOT);

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

/* ALL ROUTES */

$f3->route('GET @home: /', function ($f3) {require APP_PATH . '/controllers/home.get.php';});
$f3->route('GET @twitter: /twitter/now', 'Evangelist->twitter');

$f3->route('GET @reddit_callback: /reddit/callback', 'Evangelist->reddit');
$f3->route('GET|POST @reddit: /reddit', 'Evangelist->reddit');

$f3->route('GET @api: /api', function ($f3) {require APP_PATH . '/controllers/api.get.php';});

$f3->route('GET @random: /random/@format', function ($f3) {include APP_PATH . '/controllers/random.get.php';});
$f3->route('GET @random: /random', function ($f3) {include APP_PATH . '/controllers/random.get.php';});

$f3->route('GET @latest: /latest', function ($f3) {include APP_PATH . '/controllers/latest.get.php';});
$f3->route('GET @popular: /popular', function ($f3) {include APP_PATH . '/controllers/popular.get.php';});

$f3->route('GET @user_favourites: /of-mine', function ($f3) {include APP_PATH . '/controllers/user-favourites.get.php';});

$f3->route('GET @archive: /human-channels', function ($f3) {include APP_PATH . '/controllers/human-channels.get.php';});

$f3->route('GET @feed: /feed', function ($f3) {include APP_PATH . '/controllers/feed.get.php';});
$f3->route('GET @feed: /feed/@format', function ($f3) {include APP_PATH . '/controllers/feed.get.php';});

$f3->route('GET @feed_random: /feed_random', function ($f3) {include APP_PATH . '/controllers/feed_random.get.php';});

$f3->route('GET @sitemap: /sitemap', function ($f3) {include APP_PATH . '/controllers/sitemap.get.php';});
$f3->redirect('GET|HEAD /sitemap.xml', '/sitemap');

$f3->route('POST @favourite: /favourite/@quote [ajax]', function ($f3) {include APP_PATH . '/controllers/favourite.ajax.php';});

$f3->route('GET /search [ajax]', function ($f3) {include APP_PATH . '/controllers/search.ajax.php';});

$f3->route('GET|POST @author_edit: /author/@action/@slug', function ($f3) {include APP_PATH . '/controllers/author-edit.get.post.php';});

$f3->route('GET|POST @author_add: /author/add', function ($f3) {include APP_PATH . '/controllers/author-add.get.post.php';});

$f3->route('GET|POST @quote_add: /quote/add', function ($f3) {include APP_PATH . '/controllers/quote-add.get.post.php';});

$f3->route('GET|POST @quote_action: /quote/@action/@id', function ($f3) {include APP_PATH . '/controllers/quote-action.get.post.php';});

$f3->route('GET @pending_quotes: /pending', function ($f3) {include APP_PATH . '/controllers/pending-quotes.get.php';});

$f3->route('GET /of/@author', function ($f3) {include APP_PATH . '/controllers/author-single.get.php';});

$f3->route('GET @auth: /auth', function ($f3) {
    include APP_PATH . '/vendor/hybridauth/hybridauth/hybridauth/index.php';
});

$f3->route('GET @auth_action: /auth/@action', function ($f3) {
    include APP_PATH . '/controllers/auth-action.get.php';
});

$f3->route('GET @login: /login', function ($f3) {include APP_PATH . '/controllers/login.get.php';});

$f3->route('POST /login', function ($f3) {include APP_PATH . '/ontrollers/login.post.php';});

$f3->route('GET @fix_totals: /fix-author-totals', function ($f3) {include APP_PATH . '/controllers/fix-author-totals.get.php';});

$f3->route('GET @privacy_policy: /privacy-policy', function ($f3) {include APP_PATH . '/controllers/privacy-policy.get.php';});

$f3->route('GET @mailinglist: /daily', function ($f3) {include APP_PATH . '/controllers/daily.get.php';});
$f3->route('GET @thankyou: /thank-you-dear', function ($f3) {include APP_PATH . '/controllers/thank-you.get.php';});

/*
Redirect previous permalink scheme to current one.
 */
$f3->route('GET|HEAD /@id', function ($f3) {
    $id = '/quote/view/' . $f3->get('PARAMS.id');
    $f3->reroute($id);
});
$f3->route('GET @logout: /logout',
    function ($f3) {
        $f3->clear('SESSION');
        $f3->reroute('/');
    }
);

// Error 404
/*
$f3->set('ONERROR', function($f3){
$view=new View;
echo $view->render('404.php');
});
 */

$f3->set('current_url', $f3->PATH);
$f3->set('latest_url', $f3->alias('latest'));
$f3->set('pending_url', $f3->alias('pending_quotes'));
$f3->set('privacy_url', $f3->alias('privacy_policy'));
$f3->set('archive_url', $f3->alias('archive'));

$f3->run();
