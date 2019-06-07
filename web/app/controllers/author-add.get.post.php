<?php
if( !is_logged_in()){
    die("you need to be logged in.");
    $f3->reroute('@login');
    exit;
}


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