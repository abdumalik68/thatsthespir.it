<?php
global $db;

$format = $f3->get('PARAMS.format');


$quote=new Spirit();
$random = $quote->get('random_unique');
$_SESSION['used_quotes'][]= $random->id;

if ($format !== 'json'){
	header("Location: /quote/view/".$random->id);

}else{
	header('Content-Type: application/json');
	$random->url = WWWROOT.'/quote/view/'.$random->quote_id;
	if(!empty($random->photo)){
		$random->photo = WWWROOT. '/uploads/'.$random->photo;	
	}
	$random->quote = strip_tags($random->quotes);
	echo json_encode($random);
}
exit;