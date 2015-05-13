<?php

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



// all authors, cached for 5 minutes.
$authors = $db->exec('SELECT * FROM authors WHERE total > 0 ORDER BY total DESC, slug ASC' ,NULL, 300);
$f3->set('all_authors', $authors);
$f3->set('upload_folder', $f3->get('UPLOADS'));
$f3->set('query', $f3->get('SESSION.query'));


//header('X-Frame-Options: GOFORIT');

$f3->route('GET @api: /api',
	function($f3) {
		global $db, $metatags;
		//$f3->set('user', $f3->get('SESSION.user') );

		$quote=new Spirit();
		$random = $quote->get('random_unique');

		$author = new DB\SQL\Mapper($db, 'authors');
		$author->load( array('id=?', $random['author_id']) );

		// Using SESSION, let's try not to show twice the same quote.

		$_SESSION['used_quotes'][]= $random['id'];
		$photo = (!empty($author->photo)) ? WWWROOT.'/uploads/'.$author->photo : '' ;
		$result = array('quote'=> $random['quote'], 'author'=> $author->fullname, 'id'=>$random['id'], 'permalink'=> WWWROOT.'/quote/view/'.$random['id'], 'photo'=> $photo, 'gender'=>$author->gender, 'slug'=>$author->slug, 'total_quotes'=>$author->total );
		header('content-type: application/json; charset=utf-8');
		echo json_encode($result);
		exit;
	});


$f3->route('GET @home: /',
	function($f3) {
		global $db, $metatags;

		header_remove('X-Frame-Options');
		$f3->set('user', $f3->get('SESSION.user') );

		// Get random quote
		$quote=new Spirit();
		$random = $quote->get('random');

		// Tags
		$tags= new DB\SQL\Mapper($db, 'tags');
		$tags->load(array('id=?', $random->tags_id));

		$author = new DB\SQL\Mapper($db, 'authors');
		$author->load( array('id=?', $random->author_id) );
		$f3->set('author', $author);
		$f3->set('quote', $random);
		$f3->set('tags', $tags);

		$f3->set('body_class', "home");
		$f3->set('content', 'home.php');
		$f3->set('metatags', $metatags);
		$view=new View;
		echo $view->render('layout.php');
		$f3->clear('SESSION.query');
	}
);

$f3->route('GET @latest: /latest',
	function($f3) {
		global $db, $metatags;
		$f3->set('user', $f3->get('SESSION.user') );
		header_remove('X-Frame-Options');

		// Get random quote
		$quote =new Spirit();
		$quotes = $quote->get('latest');

		$f3->set('quotes', $quotes);

		$f3->set('body_class', "latest");
		$f3->set('content', 'latest.php');
		$f3->set('metatags', $metatags);
		$view=new View;
		echo $view->render('layout-page.php');
		$f3->clear('SESSION.query');
	}
);

$f3->route('GET @feed: /feed',
	function($f3) {
		global $db;

		header('Content-Type: text/xml; charset=utf-8');

		$quote=new Spirit();
		$items = $quote->get('latest');
		$rss1 = array();
		if(count($items)>0){
			foreach($items as $i){
				//print_r($i);

				$rss1[] = (object)[
				'title' => truncate($i['quote'], 250)
				, 'description' => $i['quote']. '<br>– '.$i['fullname']
				, 'url' => WWWROOT.'/quote/view/'.$i['quote_id']
				, 'category' => ''
				, 'date' => date("r", strtotime($i['creation_date']))
				];
			}

		}

		$rss = new RSS;
		$rss->title = "That's The Spirit!";
		$rss->url = WWWROOT.'/feed';
		$rss->description = $rss->title;
		$rss->date = $rss1[0]->date;
		$rss->items = $rss1;
		echo $rss->generate();
		exit;
	}
);

$f3->route('GET @feed: /feed_random',
	function($f3) {
		global $db;

		header('Content-Type: text/xml; charset=utf-8');

		// Get random quote
		if(!isset($_SESSION['used_quotes'])){
			$_SESSION['used_quotes'] = array();
		}
		$quote = new Spirit();
		$item = $quote->get('random_unique_with_photo');
		$rss1 = array();
		if(is_object($item)){
			$permalink = WWWROOT.'/quote/view/' . $item->quote_id;
			$filename =$_SERVER['DOCUMENT_ROOT'].'/'.UPLOADS.$item->photo;
			$photo='';
			if(!empty($item->photo) && is_file($filename)){
				$photo = '<div class="avatar" title="'.ucfirst($item->fullname). '" style="margin:1em auto;border-radius:50%;width:200px;height:200px;background-color:white;background-position: center center;background-repeat: no-repeat;background-size:cover;background-image: url('.WWWROOT.'/'.UPLOADS.$item->photo.');-webkit-box-shadow: inset 0px 0px 45px 5px rgba(18,18,18,0.19);-moz-box-shadow: inset 0px 0px 45px 5px rgba(18,18,18,0.19);box-shadow: inset 0px 0px 45px 5px rgba(18,18,18,0.19);"></div>';
			}
			// Mr. or Ms. ?
			$description = '<div style="text-align:center">';
			$description .= ($item->gender=='f') ? 'Ms. ' : '';
			$description .= '<strong>'.ucfirst($item->fullname). '</strong></a> <em>once said:</em><blockquote cite="'.$permalink.'" style="font-family:georgia, serif;font-size:32px;line-height:1.4">'.$photo;
			$description .= (isset($item->quote)) ? html_entity_decode($item->quote): '';
			$description .= '</blockquote></div>';

			$rss1[] = (object)[
			'title' => truncate($item->quote, 250)
			, 'description' => $description
			, 'url' => $permalink
			, 'category' => $item->tags
			//, 'date' => date("r", strtotime($item->creation_date))
			, 'date' => date("r", strtotime("-2 hour"))
			];
		}

		$rss = new RSS;
		$rss->title = "The Spirit! of the day";
		$rss->url = WWWROOT.'/feed_random';
		$rss->description = $rss->title;
		//$rss->date = $rss1[0]->date;
		$rss->date = date('D, d M Y H:i:s O', strtotime("-1 hour"));
		$rss->items = $rss1;
		echo $rss->generate();
		exit;
	}
);

$f3->route('GET @sitemap: /sitemap',
	function($f3) {
		global $db;

		header('Content-Type: text/xml; charset=UTF-8');

		$quote=new Spirit();
		$quotes = $quote->get('sitemap');

		echo '<?xml version="1.0" encoding="UTF-8"?>';?><urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
		foreach($quotes as $quote){
			$priority = '1';
			$changefreq = 'monthly';
			?><url>
		<loc><?php echo WWWROOT . $quote['url'] ?></loc>
		<changefreq><?php echo $changefreq ?></changefreq>
		<priority><?php echo $priority ?></priority>
	</url><?php
		}
		?></urlset><?php

	});


$f3->route('GET @search: /search [ajax]',
	function($f3) {
		global $db, $metatags;
		header_remove('X-Frame-Options');

		$query = $f3->get('REQUEST.query');

		$result = $db->exec("SELECT * FROM (SELECT LOWER(quote) as value, CONCAT('quotes:',id) as data FROM quotes UNION SELECT LOWER(fullname) as value, CONCAT('authors:',slug) as data FROM authors) AS U WHERE U.value like LOWER(:query)", array( ':query' => "%$query%") );
		$f3->set('SESSION.query', $query);
		$result = array("suggestions"=> $result );
		echo json_encode($result);
		exit;
	});

$f3->route('GET|POST @author_edit: /author/@action/@slug', function($f3){

		global $db, $metatags;

		$f3->set('user', $f3->get('SESSION.user') );
		$f3->set('upload_folder', $f3->get('UPLOADS'));
		$slug= $f3->get('PARAMS.slug');

		if ($f3->get('SESSION.logged_in') != 'ok'){
			// User not logged in, redirect to login page.
			$f3->set('SESSION.goto', '@author_edit(@slug='.$slug.')' ) ;
			$f3->reroute('@login');
		}

		$author=new DB\SQL\Mapper($db, 'authors');
		$author->load(array('slug=?', $slug ));
		$web = \Web::instance();

		switch($f3->get('PARAMS.action')){

		case 'delete':

			if (!$author->dry()){
				// Effacer les quotes de l'auteur ?
				$author->erase();
			}
			$f3->reroute('@home');
			break;

		case  'edit':
			if($_POST){
				$author->copyFrom('POST');
				//$author->slug = $web->slug($f3->get('POST.fullname'));
				if($_FILES){

					$photo = new upload($_FILES['photo']);
					$photo->file_safe_name = true;
					$photo->allowed = array('image/*');
					if ($photo->uploaded) {
						// save uploaded image with no changes
						$photo->process($f3->get('UPLOADS'));
						if ($photo->processed) {

							$photo->image_default_color= '#FFFFFF';
							$photo->image_greyscale= true;
							$photo->file_name_body_pre = 'greyscale_';
							$photo->image_resize = true;
							$photo->image_x = 400;
							$photo->image_ratio_y = true;
							$photo->process($f3->get('UPLOADS'));
							if ($photo->processed) {
								$author->photo = $photo->file_dst_name;
							}else{
								die('error : ' . $photo->error);
							}

						} else {
							die('error : ' . $photo->error);
						}
					}
				}

				$author->save();
				$f3->set('SESSION.message',  "Thanks! Author updated.");
			}
			$author->copyTo('POST');
			$metatags['title'] = "Edit Author ".$author->fullname;
			$metatags['description'] = "Edit info about Author ". $author->fullname;
			$metatags['url']= WWWROOT.'/author/edit/'.$slug;



			break;
		}

		$f3->set('post', $f3->get('POST'));
		$f3->set('content', 'author.edit.php');
		$f3->set('body_class', "quote-edit");
		$f3->set('metatags', $metatags);
		$view=new View;
		echo $view->render('layout.php');
		$f3->clear('SESSION.message');
	});

$f3->route('GET|POST @author_add: /author/add', function($f3){
		global $db, $metatags;
		$f3->set('user', $f3->get('SESSION.user') );

		$f3->set('content', 'author.edit.php');
		$f3->set('body_class', "quote-add");

		$f3->set('upload_folder', $f3->get('UPLOADS'));

		$author=new DB\SQL\Mapper($db, 'authors');
		$web = \Web::instance();
		if($_POST){
			$errors = array();
			$author->copyFrom('POST');

			if(empty(trim($author->fullname))){
				$errors['fullname']= 'Please enter the full name of this author';
			}

			$dups = $author->count(array('fullname = ?', $author->fullname));
			if($dups >0){
				$errors['fullname']= 'This author\'s Spirit has already been instantiated. Thank you nonetheless!';
			}
			if(count($errors)<1){
				$author->slug = $web->slug($f3->get('POST.fullname'));
				if($_FILES){

					$photo = new upload($_FILES['photo']);
					$photo->allowed = array('image/*');
					if ($photo->uploaded) {
						// save uploaded image with no changes
						$photo->process($f3->get('UPLOADS'));
						if ($photo->processed) {
							$photo->image_default_color= '#FFFFFF';
							$photo->image_greyscale= true;
							$photo->file_name_body_pre = 'greyscale_';
							$photo->image_resize = true;
							$photo->image_x = 400;
							$photo->image_ratio_y = true;
							$photo->process($f3->get('UPLOADS'));
							if ($photo->processed) {
								$author->photo = $photo->file_dst_name;
							}else{
								die('error : ' . $photo->error);
							}

						} else {
							die('error : ' . $photo->error);
						}
					}
				}
				$author->save();
				$f3->set('SESSION.author.id', $author->id);
				$f3->set('SESSION.message',  "Thanks! Author added.");
				$f3->reroute('@quote_add');
			} else{
				$f3->set('errors', $errors);
			}
		}
		$f3->set('post', $author->cast());

		$metatags['title'] = "Add an Author ";
		$metatags['description'] = "Add info about an Author";
		$metatags['url']= WWWROOT.'/author/add/';
		$f3->set('metatags', $metatags);
		$view=new View;
		echo $view->render('layout.php');
	});

$f3->route('GET|POST @quote_add: /quote/add', function($f3){
		global $db, $metatags;

		$f3->set('user', $f3->get('SESSION.user') );
		$f3->set('body_class', "quote-add");
		$tags = $db->exec('SELECT * FROM tags ORDER By name ASC');
		$f3->set('tags', $tags);

		$quote=new DB\SQL\Mapper($db, 'quotes');

		if($_POST){
			//overwrite with values just submitted
			$quote->copyFrom('POST');
			if(!isset($_POST['status'])){
				$quote->status='pending';
			}
			/*
			echo '<pre>';
			print_r($_POST);
			exit;
*/
			$quote->tags_id = implode(',', $f3->get('POST.tags_id'));
			$quote->save();

			// lorsque ajout d'une quote, incrémenter le total de l'author
			$author=new DB\SQL\Mapper($db, 'authors');
			$author->load(array('id=?', $quote->author_id));
			if (!$author->dry()){
				$author->total++;
				$author->save();
			}
			$f3->set('SESSION.message',  "Thanks! Quote added.");

			// Email to admin
			$smtp = new SMTP ( 'smtp.gmail.com', 465, 'SSL', 'aplennevaux@gmail.com', 'iluvrocknroll' );

			$smtp->set('From', '"pixeline" <alexandre@pixeline.be>');
			$smtp->set('To', '<aplennevaux@gmail.com>');
			$smtp->set('Subject', "That's The Spirit: New Quote submitted to your attention, master");
			$smtp->set('Errors-to', '<alexandre@pixeline.be>');

			$message = 'On '.date('d.m.Y at H:i:s').', a new quote was submitted to your attention, kind master.'."\n---\n";
			$message .= $quote->quote . ' by '. $author->fullname;
			$message .="\n---\nReview it here: ".WWWROOT . $f3->alias('pending_quotes') . "\nSee you,\n\nThe Spirit.";
			$sent = $smtp->send($message, TRUE);
			// Quote saved, redirecting...
			$f3->reroute('@quote_action(action=view,id='.$quote->id.')');
			exit;
		}

		$authors = $db->exec('SELECT DISTINCT id, fullname, slug FROM authors ORDER BY slug ASC');

		$quote->author_id = $f3->get('SESSION.author.id');
		$quote->status = ($f3->get('SESSION.logged_in') != 'ok') ? 'pending' : 'online';
		$f3->set('quote', $quote);
		$f3->set('authors', $authors);

		$quote->copyTo('POST');
		$f3->set('content', 'quote.edit.php');

		$metatags['title'] = "Suggest a new inspirational quote";
		$metatags['description'] = "Suggest a new inspirational quote on Design or creativity";
		$metatags['url']= WWWROOT.'/quote/add/';

		$view=new View;
		$f3->set('metatags', $metatags);
		echo $view->render('layout-page.php');
		$f3->clear('SESSION.message');
	});


$f3->route('GET|POST @quote_action: /quote/@action/@id',
	function($f3) {
		global $db, $metatags;

		$action = $f3->get('PARAMS.action');
		$id = $f3->get('PARAMS.id');

		// Admin-restricted areas
		$restricted = array('edit', 'delete', 'validate');

		if (in_array($action, $restricted) && $f3->get('SESSION.logged_in') != 'ok'){
			// User not logged in, redirect to login page.
			$f3->set('SESSION.goto', '@quote_action(@id='.$id.',@action='.$action.')' ) ;
			$f3->reroute('@login');
		}

		// Fetch the quote data
		$quote=new DB\SQL\Mapper($db, 'quotes');
		if ($id) {
			$quote->load(array('id=?', $id));
		}

		if($quote->dry()){
			//  No quote found with that id, return 404
			$f3->error(404);
		}

		// Tags
		$tags= new DB\SQL\Mapper($db, 'tags');
		$tags->load(array('id=?', $quote->tags_id));

		// Common to all actions
		$f3->set('tags', $tags);
		$f3->set('user', $f3->get('SESSION.user') );
		$f3->set('body_class', "quote-$action");
		$metatags['title'] = "$action quote $id";
		$metatags['description'] = "$action quote $id:". $quote->quote;

		switch ($action){

		case 'validate':

			$quote->status='online';
			$quote->save();
			$f3->reroute('@quote_action(action=view,id='.$quote->id.')');
			break;

		case 'edit':

			if($_POST){
				//overwrite with values just submitted
				$quote->copyFrom('POST');
				$quote->tags_id = implode(',', $f3->get('POST.tags_id'));
				$quote->save();
				$f3->set('SESSION.message', "Quote updated.");
			}

			$f3->set('quote', $quote);
			$tags = $db->exec('SELECT * FROM tags ORDER By name ASC');
			$f3->set('tags', $tags);
			$authors = $db->exec('SELECT DISTINCT id, fullname, slug, photo FROM authors ORDER BY slug ASC');
			$f3->set('authors', $authors);

			$quote->copyTo('POST');
			$f3->set('content', 'quote.edit.php');
			break;

		case 'delete':

			// lorsque suppression d'une quote, décrémenter le total de l'author
			$author=new DB\SQL\Mapper($db, 'authors');
			$author->load(array('id=?', $quote->author_id));
			if (!$author->dry()){
				$author->total--;
				$author->save();
			}
			$quote->erase();
			$f3->reroute('@home');

			break;

		case 'view':
			header_remove('X-Frame-Options');

			$f3->set('quote', $quote);
			$author = new DB\SQL\Mapper($db, 'authors');
			$author->load( array('id=?', $quote->author_id) );
			$filename =$_SERVER['DOCUMENT_ROOT'].'/'.UPLOADS.$author->photo;
			if(!empty($author->photo) && is_file($filename)){
				$metatags['image'] = WWWROOT.'/'.UPLOADS. $author->photo;
				$size = getimagesize($filename);
				$metatags['image:width'] = $size[0];
				$metatags['image:height'] = $size[1];
			}
			$metatags['title'] = $quote->quote;
			$metatags['description'] = $quote->quote ." – ". $author->fullname;

			$f3->set('author', $author);
			$f3->set('content', 'quote.view.php');


			break;
		default:

			$f3->error(404);
			break;
		}

		$metatags['url']= WWWROOT.'/quote/'.$action.'/'.$id.'/';


		$view=new View;
		$f3->set('metatags', $metatags);
		echo $view->render('layout.php');
		$f3->clear('SESSION.query');
	});






$f3->route('GET @pending_quotes: /pending',
	function($f3) {
		global $metatags;
		if ($f3->get('SESSION.logged_in') != 'ok'){
			$f3->set('SESSION.goto', '@pending_quotes');
			$f3->reroute('@login');
		}
		$f3->set('user', $f3->get('SESSION.user') );
		$quote=new Spirit();
		$pending = $quote->get('pending');
		$f3->set('pending_quotes', $pending);
		$f3->set('body_class', "pending");
		$f3->set('content', 'pending.php');
		$view=new View;
		$f3->set('metatags', $metatags);
		echo $view->render('layout-page.php');
	}


);

$f3->route('GET /of/@author',
	function($f3) {
		global $db, $metatags;

		$author=new DB\SQL\Mapper($db, 'authors');
		$author->load(array('slug=?', $f3->get('PARAMS.author')));
		if($author->dry()){
			$f3->error(404);
			exit;
		}
		$quotes = new DB\SQL\Mapper($db, 'quotes');
		$hisquotes = $quotes->select('id,quote,source,author_id', 'author_id='.$author->id.' and status ="online"' );


		$filename =$_SERVER['DOCUMENT_ROOT'].'/'.UPLOADS. $author->photo;
		if(!empty($author->photo) && is_file($filename)){
			$metatags['image'] = WWWROOT.'/'.UPLOADS.$author->photo;
			$size = getimagesize($filename);
			$metatags['image:width'] = $size[0];
			$metatags['image:height'] = $size[1];
		}
		$metatags['title'] = $author->fullname;
		$metatags['url'] = WWWROOT.'/of/'.$f3->get('PARAMS.author');
		$metatags['description'] = $author->total. " inspirational quotes by ".$author->fullname;
		$f3->set('user', $f3->get('SESSION.user') );
		$f3->set('author', $author);
		$f3->set('his_quotes', $hisquotes);
		$f3->set('content', 'author.php');
		$f3->set('body_class', "of-author");

		$view=new View;
		$f3->set('metatags', $metatags);
		echo $view->render('layout.php');

		$f3->clear('SESSION.query');

	}


);

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
$f3->route('GET @login: /login',
	function($f3) {
		global $metatags;
		if ($f3->get('SESSION.logged_in') == 'ok'){
			$f3->reroute('/');
		}
		$f3->set('user', $f3->get('SESSION.user') );

		$f3->set('content', 'login.php');
		$f3->set('body_class', "login");
		$metatags['title'] = "Login";
		$metatags['url'] = WWWROOT.'/login';
		$template=new View;
		$f3->set('metatags', $metatags);
		echo $template->render('layout.php');
	}


);

$f3->route('POST /login',
	function($f3) {
		if ($f3->get('SESSION.logged_in') == 'ok'){
			$f3->reroute('/');
		}

		global $db, $metatags;
		// sanitization
		$username = trim(htmlspecialchars($f3->get('POST.username')));
		$password = trim(htmlspecialchars($f3->get('POST.password')));
		// validation
		$errors = array();
		if(empty($username)){
			$errors['username'] = 'Please indicate your username';
		}
		if(empty($password)){
			$errors['password'] = 'Please indicate your password';
		}
		if(count($errors)<1){
			// check for user
			//$password = crypt($f3->get('password'), SALT);
			$user = new DB\SQL\Mapper($db, 'users');
			$user->load(array('email = :username and password = :password  LIMIT 0,1', ':username'=>$username, ':password'=>$password));
			if($db->count()==1){
				$f3->set('SESSION.logged_in', 'ok');
				$f3->set('SESSION.user',  array('email'=>$user->email, 'fullname'=>$user->fullname, 'role'=>$user->role));
				if(!empty($f3->get('SESSION.goto'))){
					$f3->reroute($f3->get('SESSION.goto'));
				}else{
					$f3->reroute('/');
				}
			}
		} else{
			$f3->set('SESSION.errors', $errors);
		}
		$f3->reroute('@login');
	});


$f3->route('GET @fix_totals: /fix-author-totals', function($f3){
		/*
	FIX TOTAL value for each author
	*/
		global $db;
		$totals = $db->exec("SELECT count(*) as total, author_id FROM `quotes` as q group by q.author_id order by total desc");
		if(count($totals)>0){
			$db->begin();
			foreach($totals as $a){
				$db->exec("UPDATE authors set total='".$a['total']."' WHERE id='".$a['author_id']."'");
			}
			$db->commit();
		}

		if($f3->get('DEBUG') > 1){
			echo '<pre>';
			echo $db->log();
		} else{
			$f3->reroute('/');
		}
	});

$f3->route('GET @privacy_policy: /privacy-policy',
	function($f3) {
		global $metatags;
		$f3->set('user', $f3->get('SESSION.user') );

		$f3->set('body_class', "layout-page");
		$f3->set('content', 'privacy-policy.php');
		$f3->set('metatags', $metatags);
		$view=new View;
		echo $view->render('layout-page.php');
	}
);

$f3->set('current_url', $f3->PATH);
$f3->set('latest_url', $f3->alias('latest') );
$f3->set('pending_url', $f3->alias('pending_quotes') );
$f3->set('privacy_url', $f3->alias('privacy_policy') );

$f3->run();