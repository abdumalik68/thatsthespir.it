<?php

$total = count((array)$quotes);

?><section class="latest-quotes">
	<h1 class="ui-title topline" style="background:white;"><?= $metatags['title'] ?> (<?= $total ?> so far).</h1>
	
	<ol class="latest-quotes-list">
	<?php

	foreach ($quotes as $k=>$q){
		?>
		<li>
		<?php
		

		$quote = (object)$q;
		$author = (object)$q;

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
	