<?php

global $db, $metatags;
$f3->set('user', $f3->get('SESSION.user') );
header_remove('X-Frame-Options');

// Get random quote
$quote = new Spirit();
$quotes = $quote->get('popular');

$f3->set('quotes', $quotes);

$f3->set('body_class', "popular");
$f3->set('content', 'popular.php');

$metatags['title'] = 'The Spirit\'s most popular quotes.';

$f3->set('metatags', $metatags);
$view=new View;
echo $view->render('layout-page.php');
$f3->clear('SESSION.query');