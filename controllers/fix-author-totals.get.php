<?php
/*
	FIX TOTAL value for each author
*/


global $db;
$totals = $db->exec("SELECT count(*) as total, author_id FROM `quotes` as q group by q.author_id order by total desc");
if(count($totals)>0){
	$db->begin();
	foreach($totals as $a){
		$db->exec("UPDATE authors set total='".$a['total']."' WHERE id='".$a['author_id']."'");
	}
	$db->commit();
}

if($f3->get('DEBUG') > 1){
	echo '<pre>';
	echo $db->log();
} else{
	$f3->reroute('/');
}