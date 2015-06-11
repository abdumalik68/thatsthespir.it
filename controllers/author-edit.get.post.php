<?php

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