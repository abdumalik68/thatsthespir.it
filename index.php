<?php
session_start(); // ready to go!
/*

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}
*/

// either new or old, it should live at most for another hour
//$_SESSION['discard_after'] = $now + (24*3600);

// Start FatFreeFramework
$f3 = require 'lib/base.php';

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');
// Load configuration

$f3->set('AUTOLOAD', 'classes/');
/*

		that's the spirit.

*/

require 'functions.inc.php';
require 'config.inc.php';

$f3->set('DEBUG', DEBUG);
$f3->set('UPLOADS', UPLOADS);
$f3->set('image_width', 100);

$f3->set('UI', 'ui/');

$metatags = array(
	'title'=>"That's the spirit!",
	'description'=>'Inspirational and motivational quotes for the creative soul.',
	'site_name'=>'That\'s The Spirit!',
	'image'=>WWWROOT.'/ui/img/tts-og-image.jpg',
	'image:width'=>800,
	'image:height'=>574,
	'url' => WWWROOT);

$db=new DB\SQL(
	'mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME.';charset=utf8',
	DB_USER,
	DB_PASSWORD
);



/*
	CRON TASKS
	Documentation: https://github.com/xfra35/f3-cron
*/

$cron=Cron::instance();
$cron->log=TRUE;
$cron->web=TRUE;
//$cron->set('reddit','Evangelist->reddit','*/5 * * * *');
//$cron->set('reddit','Evangelist->reddit','@daily');
$cron->set('twitter','Evangelist->twitter','@daily');


// END CRON TASKS


$f3->set('upload_folder', $f3->get('UPLOADS'));
$f3->set('query', $f3->get('SESSION.query'));

if (!isset($_SESSION['used_quotes'])){
	$_SESSION['used_quotes']= array();
}

// LOGGED_IN: Convenience Constant to check whether user is logged in.
define('LOGGED_IN',($f3->get('SESSION.logged_in') == 'ok'));
define('CURRENT_URI', $f3->get('PATH')); // ex: "/login" (mind the Slash!)


/*
 STORE QUERY VARS IN SESSION FOR AFTER OPAUTH REDIRECT
*/

if($f3->get('PARAMS.goto')){
	$f3->set('SESSION.goto', $f3->get('PARAMS.goto'));
}

if(isset($_GET['next_action'])){
	$f3->set('SESSION.next_action', $_GET['next_action']);
}
if(isset($_GET['quote_id'])){
	$f3->set('SESSION.quote_id', $_GET['quote_id']);
}



/* ALL ROUTES */
$f3->route('GET @home: /', function($f3) { require 'controllers/home.get.php'; });
$f3->route('GET @twitter: /twitter/now', 'Evangelist->twitter');


$f3->route('GET @reddit_callback: /reddit/callback', 'Evangelist->reddit');
$f3->route('GET|POST @reddit: /reddit', 'Evangelist->reddit');

$f3->route('GET @api: /api', function($f3) { require 'controllers/api.get.php'; });

$f3->route('GET @random: /random/@format', function($f3) { require 'controllers/random.get.php'; });
$f3->route('GET @random: /random', function($f3) { require 'controllers/random.get.php'; });

$f3->route('GET @latest: /latest', function($f3) { require 'controllers/latest.get.php'; });
$f3->route('GET @popular: /popular', function($f3) { require 'controllers/popular.get.php'; });

$f3->route('GET @user_favourites: /of-mine', function($f3) { require 'controllers/user-favourites.get.php'; });

$f3->route('GET @archive: /human-channels', function($f3) { require 'controllers/human-channels.get.php'; });

$f3->route('GET @feed: /feed', function($f3) { require 'controllers/feed.get.php'; });
$f3->route('GET @feed: /feed/@format', function($f3) { require 'controllers/feed.get.php'; });

$f3->route('GET @feed_random: /feed_random', function($f3) { require 'controllers/feed_random.get.php'; });

$f3->route('GET @sitemap: /sitemap', function($f3) { require 'controllers/sitemap.get.php'; });
$f3->redirect('GET|HEAD /sitemap.xml', '/sitemap');

$f3->route('POST @favourite: /favourite/@quote [ajax]', function($f3) { require 'controllers/favourite.ajax.php'; });


$f3->route('GET @search: /search [ajax]', function($f3) { require 'controllers/search.ajax.php'; });

$f3->route('GET|POST @author_edit: /author/@action/@slug', function($f3){ require 'controllers/author-edit.get.post.php'; });

$f3->route('GET|POST @author_add: /author/add', function($f3){ require 'controllers/author-add.get.post.php';});

$f3->route('GET|POST @quote_add: /quote/add', function($f3){ require 'controllers/quote-add.get.post.php'; });

$f3->route('GET|POST @quote_action: /quote/@action/@id', function($f3) { require 'controllers/quote-action.get.post.php'; });

$f3->route('GET @pending_quotes: /pending', function($f3) { require 'controllers/pending-quotes.get.php'; });

$f3->route('GET /of/@author', function($f3) { require 'controllers/author-single.get.php'; });

$f3->route('GET @auth: /auth', function($f3){ require 'controllers/hybridauth/index.php'; });
$f3->route('GET @auth_action: /auth/@action', function($f3){ require 'controllers/auth-action.get.php';});


$f3->route('GET @login: /login', function($f3) { require 'controllers/login.get.php'; });

$f3->route('POST /login', function($f3) { require 'controllers/login.post.php'; });

$f3->route('GET @fix_totals: /fix-author-totals', function($f3){ require 'controllers/fix-author-totals.get.php'; });

$f3->route('GET @privacy_policy: /privacy-policy', function($f3) { require 'controllers/privacy-policy.get.php'; });

$f3->route('GET @mailinglist: /daily', function($f3) { require 'controllers/daily.get.php'; });
$f3->route('GET @thankyou: /thank-you-dear', function($f3) { require 'controllers/thank-you.get.php'; });

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