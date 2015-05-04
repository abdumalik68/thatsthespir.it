<section class="latest-quotes">
	<h1 class="ui-title topline" style="background:white;">Newcomers.</h1>
	
	<ol class="latest-quotes-list">
	<?php 
	foreach ($quotes as $q){
		?>
		<li>
		<?
		$quote = $q;
		$author = $q;
		$quote['id'] = $quote['quote_id'];
		include 'single-quote-abstract.view.php';
		?>
		</li>
		<?
	}	
	?>
	</ol>
</section>
	