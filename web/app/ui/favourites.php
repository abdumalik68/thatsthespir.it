<?php

$total = count((array) $quotes);

?><section class="latest-quotes">
	<h1 class="ui-title topline" style="background:white;"><?php echo $metatags['title'] ?> (<?php echo $total ?> so far).</h1>

	<?php
if ($total > 0) {
    ?>
		<ol class="latest-quotes-list">

<?php
foreach ($quotes as $k => $q) {
        ?>
		<li>
		<?php

        $quote = (object) $q;
        $author = (object) $q;

        $showLargeAvatar = false;
        include 'single-quote.view.php';

        if ($k < ($total - 1)) {
            ?>
			<span class="sep">⤫</span>
		<?php
}
        ?>
		</li>
		<?php
}
    ?></ol><?php
} else {
    ?>
<p class="tip">This is where the quotes you have favourited will appear. You haven't favourited any yet, so <a href="/">Go</a> <a href="/">get</a> <a href="/">some</a>!</p>
<figure class="explain center">
	<figcaption><p>To add a quote to your "favourites", click on the little &hearts; sign underneath.</p></figcaption>
	<img src="/assets/img/how-to-favourite-a-quote-illustration.jpeg" alt="To favourite a quote" width="687" height="431" class="image-drop-shadow" /></figure>
<?php
}

?>

</section>
