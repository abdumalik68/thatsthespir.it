		<section class="latest-quote">
			<h1 class="ui-title topline" style="background:white;">Pending approval</h1>

<?php
//print_r($pending_quotes);
if(count($pending_quotes)>0){



	foreach($pending_quotes as $q){
		$quote = (object)$q;
		$author = (object)$q;
		//$quote['id'] = $quote->quote_id;
		$showLargeAvatar = true;

		include 'single-quote.view.php';
	}
} else{

?>
<p class="message no-pending-quote">No submitted quote to validate. Go and get some!</p>
<?php
}

?>

		</section>
