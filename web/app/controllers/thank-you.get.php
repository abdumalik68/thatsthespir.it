<?php
global $metatags;
$f3->set('user', $f3->get('SESSION.user') );
$f3->set('COOKIE.badge-clicked','1');
$f3->set('body_class', "layout-page");
$f3->set('content', 'thank-you-for-subscribing.php');
$f3->set('metatags', $metatags);
$view=new View;
echo $view->render('layout-page.php');