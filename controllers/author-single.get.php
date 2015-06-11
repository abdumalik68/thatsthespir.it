<?php

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
