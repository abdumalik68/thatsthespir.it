<?php

$total = count((array)$quotes);

?><section class="latest-quotes">
	<h1 class="ui-title topline" style="background:white;"><?php echo $metatags['title'] ?> (<?php echo $total ?> so far).</h1>

	<?php
if(count($quotes)>0){
?>
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
	?></ol><?php
} else{
?>
<p class="tip">You haven't saved any quote yet. <a href="/">Go</a> <a href="/">get</a> <a href="/">some</a>!</p>
<?php
}

?>

</section>
	