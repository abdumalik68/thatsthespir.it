<?php
global $db;
//$f3->set('user', $f3->get('SESSION.user') );

$quote=new Spirit();
$random = $quote->get('random_unique');
$_SESSION['used_quotes'][]= $random->id;
header("Location: /quote/view/".$random->id);
exit;