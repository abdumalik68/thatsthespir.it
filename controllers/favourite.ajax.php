<?php
global $db, $metatags;
header_remove('X-Frame-Options');

$quote = $f3->get('REQUEST.quote');
if(empty($quote)){
	$action = null;
	$status = 'no-quote-id';
}
if($_SESSION['logged_in']== 'ok' && !empty($_SESSION['user']['email']) && !empty($quote)){

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
	$total_likes = $db->exec('SELECT COUNT(*) as total FROM favourites WHERE quote_id='.$quote);
	$total_likes = (object)$total_likes[0];
	$total_likes = ($total_likes) ? $total_likes->total : '0';
	$status = 'ok';

} else{
	$action = null;
	$status = 'not-logged-in';
}

echo json_encode(array('status'=> $status, 'action'=> $action, 'total_likes'=>$total_likes));

exit;