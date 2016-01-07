<section class="latest-quote">
	<?php
		if(!isset($tags) || empty($tags) || strlen(trim($tags->name))<1){
			
		?>
	<h1 class="ui-title topline" style="background:white;">Random</h1>

	<?php 
		}
$showLargeAvatar = true;
include 'single-quote.view.php'; 
?>
</section>
	