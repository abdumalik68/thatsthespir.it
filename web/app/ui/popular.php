<section class="latest-quotes">
	<h1 class="ui-title topline" style="background:white;">Most popular quotes.</h1>

<?php
	
if( !LOGGED_IN){
	?>
	<p class="tip" style="background-color:#ffffe5;padding:1rem;text-align: center;max-width:990px;margin:0 auto 4rem;border-radius: 10px">Here are the 20 most popular quotes, based on our users' rating. <a href="<?= CURRENT_URI?>#login-ui">Want to participate in the vote?</a></p>
	<?php
	}
	?>

	<ol class="latest-quotes-list">
	<?php
	$total = count((array)$quotes);
	$count = 1;
	foreach ($quotes as $k=>$q){
		?>
		<li>
		<div class="chart-rank" style="text-align: center;">N° <?= $count;$count++ ?>.</div>
		<?php
		

		$quote = (object)$q;
		$author = (object)$q;
		//$quote['id'] = $quote->quote_id;
		$showLargeAvatar = false;
		include 'single-quote.view.php';
		if ($k<($total-1)){
		?>
			<span class="sep">⤫</span>
		<?php
		}
		?>
		</li>
		<?php
	}	
	?>
	</ol>
</section>
	