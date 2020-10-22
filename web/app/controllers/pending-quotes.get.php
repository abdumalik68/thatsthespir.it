<?php

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
