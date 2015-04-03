		<section class="latest-quote">
			<h1 class="ui-title topline" style="background:white;">Pending approval</h1>

<?php
//print_r($pending_quotes);
if(count($pending_quotes)>0){


	foreach($pending_quotes as $quote){
		$author['fullname']=$quote['fullname'];
		$author['slug']=$quote['slug'];
		$author['total']=$quote['total'];
		$author['id']=$quote['author_id'];
		$author['photo']=$quote['photo'];
		$author['gender']=$quote['gender'];
		$quote['id']= $quote['quote_id'];

		include 'single-quote.view.php';
	}
} else{

?>
<p class="message no-pending-quote">No submitted quote to validate. Go and get some!</p>
<?
}

?>

		</section>
