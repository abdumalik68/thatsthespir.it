<?php

global $db, $metatags;
$f3->set('user', $f3->get('SESSION.user') );
header_remove('X-Frame-Options');

if(!LOGGED_IN){
	$f3->set('SESSION.goto', '@user_favourites');
	$f3->reroute('@login');
}


// Get random quote
$quote = new Spirit();
$quotes = $quote->get('user_favourites');


$f3->set('quotes', $quotes);

$f3->set('body_class', "latest");
$f3->set('content', 'favourites.php');

$metatags['title'] = $_SESSION['user']['fullname']. '\'s Collection of quotes.';

$f3->set('metatags', $metatags);
$view=new View;
echo $view->render('layout-page.php');
$f3->clear('SESSION.query');