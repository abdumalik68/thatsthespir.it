<?php

global $db, $metatags;
$f3->set('user', $f3->get('SESSION.user') );
header_remove('X-Frame-Options');

// Get random quote
$quote = new Spirit();
$quotes = $quote->get('latest');

$f3->set('quotes', $quotes);

$f3->set('body_class', "latest");
$f3->set('content', 'latest.php');

$metatags['title'] = 'The Spirit\'s latest.';

$f3->set('metatags', $metatags);
$view=new View;
echo $view->render('layout-page.php');
$f3->clear('SESSION.query');