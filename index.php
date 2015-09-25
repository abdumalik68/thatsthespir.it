<?php
session_start(); // ready to go!

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 3600;

// Start FatFreeFramework
$f3 = require 'lib/base.php';

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');
// Load configuration
$f3->config('config.ini');
$f3->set('AUTOLOAD', 'classes/');
/*

		that's the spirit.

		URLS:

		/
			=> homepage

		/search/<keywords>
			=> GET search form
			=> POST search results


	*/

require 'functions.inc.php';
require 'config.inc.php';
/* OPAUTH*/
define('OPAUTH_LIB_DIR', dirname(__FILE__).'/controllers/opauth/');
define('CONF_FILE', dirname(__FILE__).'/controllers/opauth/opauth.conf.php');


// continuing F3...

$f3->set('DEBUG', DEBUG);
$f3->set('UPLOADS', UPLOADS);
$f3->set('image_width', 100);

$metatags = array(
	'title'=>"That's the spirit!",
	'description'=>'A collection of the most inspirational quotes for the creative soul. Mostly from designers, artists, scientists and writers.',
	'site_name'=>'That\'s the spirit!',
	'image'=>WWWROOT.'/ui/img/thatsthespirit-cover-image.jpg',
	'image:width'=>1200,
	'image:height'=>630,
	'url' => WWWROOT);

$db=new DB\SQL(
	'mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME,
	DB_USER,
	DB_PASSWORD
);

$f3->set('upload_folder', $f3->get('UPLOADS'));
$f3->set('query', $f3->get('SESSION.query'));

if (!isset($_SESSION['used_quotes'])){
	$_SESSION['used_quotes']= array();
}

/* ALL ROUTES */
$f3->route('GET @home: /', function($f3) { require 'controllers/home.get.php'; });

$f3->route('GET @api: /api', function($f3) { require 'controllers/api.get.php'; });

$f3->route('GET @random: /random', function($f3) { require 'controllers/random.get.php'; });

$f3->route('GET @latest: /latest', function($f3) { require 'controllers/latest.get.php'; });

$f3->route('GET @archive: /human-channels', function($f3) { require 'controllers/human-channels.get.php'; });

$f3->route('GET @feed: /feed', function($f3) { require 'controllers/feed.get.php'; });

$f3->route('GET @feed_random: /feed_random', function($f3) { require 'controllers/feed_random.get.php'; });

$f3->route('GET @sitemap: /sitemap', function($f3) { require 'controllers/sitemap.get.php'; });

$f3->route('GET @search: /search [ajax]', function($f3) { require 'controllers/search.ajax.php'; });

$f3->route('GET|POST @author_edit: /author/@action/@slug', function($f3){ require 'controllers/author-edit.get.post.php'; });

$f3->route('GET|POST @author_add: /author/add', function($f3){ require 'controllers/author-add.get.post.php';});

$f3->route('GET|POST @quote_add: /quote/add', function($f3){ require 'controllers/quote-add.get.post.php'; });

$f3->route('GET|POST @quote_action: /quote/@action/@id', function($f3) { require 'controllers/quote-action.get.post.php'; });

$f3->route('GET @pending_quotes: /pending', function($f3) { require 'controllers/pending-quotes.get.php'; });

$f3->route('GET /of/@author', function($f3) { require 'controllers/author-single.get.php'; });

$f3->route('GET @auth: /auth', function($f3){ require 'controllers/auth.php';});
$f3->route('GET @auth_action: /auth/@action/*', function($f3){ require 'controllers/auth-action.get.php';});
$f3->route('GET @auth_action: /auth/@action', function($f3){ require 'controllers/auth-action.get.php';});

$f3->route('GET @login: /login', function($f3) { require 'controllers/login.get.php'; });

$f3->route('POST /login', function($f3) { require 'controllers/login.post.php'; });

$f3->route('GET @fix_totals: /fix-author-totals', function($f3){ require 'controllers/fix-author-totals.get.php'; });

$f3->route('GET @privacy_policy: /privacy-policy', function($f3) { require 'controllers/privacy-policy.get.php'; });

$f3->route('GET @mailinglist: /daily', function($f3) { require 'controllers/daily.get.php'; });

/*
	Redirect previous permalink scheme to current one.
*/
$f3->route('GET|HEAD /@id', function($f3) {
		$id = '/quote/view/'.$f3->get('PARAMS.id');
		$f3->reroute($id);
	});
$f3->route('GET @logout: /logout',
	function($f3) {
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
$f3->set('latest_url', $f3->alias('latest') );
$f3->set('pending_url', $f3->alias('pending_quotes') );
$f3->set('privacy_url', $f3->alias('privacy_policy') );
$f3->set('archive_url', $f3->alias('archive') );

$f3->run();