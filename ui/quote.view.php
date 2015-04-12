<section class="quote">
<?php

if ($quote['status']==='pending'){
?>
	<p class="message">This quote has yet to be accepted into the Spirit.
		<?php
			if($user['role']==='admin'){
				?>
				<a href="/quote/validate/<?php echo $quote['id'];?>/">Accept it now!</a>
				<?
			}
			?>
	</p>
<?php
}
if (!empty($_SESSION['message'])){
?>
	<p class="message"><?php echo $_SESSION['message']; ?></p>
<?php
}
?>
<?php include 'single-quote.view.php'; ?>

</section>
<?php
unset($_SESSION['message']);

