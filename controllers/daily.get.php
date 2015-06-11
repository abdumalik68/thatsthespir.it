<?php
global $metatags;
$f3->set('user', $f3->get('SESSION.user') );

$f3->set('body_class', "layout-page");
$f3->set('content', 'daily.php');
$f3->set('metatags', $metatags);
$view=new View;
echo $view->render('layout-page.php');