<?php
global $db, $metatags;
header_remove('X-Frame-Options');

$quote = $f3->get('REQUEST.quote');

if($_SESSION['logged_in']== 'ok' && !empty($_SESSION['user']['email'])){

	// save the quote

	$fav = new DB\SQL\Mapper($db, 'favourites');
	$fav->load(array('user_email = :username AND quote_id=:quote LIMIT 0,1', ':username'=>$_SESSION['user']['email'] , ':quote'=> $quote));
	if(!$fav->dry()){
		$fav->erase();
		$action = 'deleted';
	}else{
		$fav->quote_id = $quote ;
		$fav->user_email = $_SESSION['user']['email'];
		$fav->save();
		$action = 'created';
	}	
	$status = 'ok';

} else{
	$action = null;
	$status = 'not-logged-in';
}
/*
$status = $db->exec("SELECT * FROM (SELECT LOWER(quote) as value, CONCAT('quotes:',id) as data FROM quotes UNION SELECT LOWER(fullname) as value, CONCAT('authors:',slug) as data FROM authors) AS U WHERE U.value like LOWER(:query)", array( ':query' => "%$query%") );

*/

echo json_encode(array('status'=> $status, 'action'=> $action));

exit;