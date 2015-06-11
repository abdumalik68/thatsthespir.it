<?php
global $metatags;
if ($f3->get('SESSION.logged_in') == 'ok'){
	$f3->reroute('/');
}
$f3->set('user', $f3->get('SESSION.user') );

$f3->set('content', 'login.php');
$f3->set('body_class', "layout-page");
$metatags['title'] = "Login";
$metatags['url'] = WWWROOT.'/login';
$f3->set('metatags', $metatags);

$view=new View;
echo $view->render('layout-page-bare.php');