<footer class="footer">
<p><a href="/daily" title="Receive a daily quote from the Spirit in your mailbox">The Spirit! by email ?</a> - <a href="<?php echo $privacy_url ?>" title="In short: Google Analytics cookies, that's about it.">Privacy policy</a> - <a href="<?php echo $archive_url ?>" title="The Spirit! choses humans as channels. Also known as &lsquo;Authors&rsquo;">All Authors</a> - Made by some <a href="https://pixeline.be" title="Best Brussels web agency">web designer in Brussels</a>
		<br><img src="ui/img/hand.svg" alt="V for Victory hand sign" class="hand">
		</p>
</footer>

<?php
//unset($_SESSION['goto']);
if(empty($_SESSION['goto'])){
	$_SESSION['goto'] = CURRENT_URI;
}

if (!LOGGED_IN && CURRENT_URI != '/login'  ){
?>

<section class="modal--show" id="login-ui" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
	<a href="<?= CURRENT_URI ?>#!" class="modal-close" title="Click to close this." data-close="Close" data-dismiss="modal">?</a>
	<div class="modal-inner">
       <div class="modal-content">
	       <p>To do that, you need to log in the Spirit! first via one of these services. It only takes a click and you're good to go.</p>
	       <ul class="single-signon-providers">
		       <li><a href="/auth/facebook<?php echo (SERVER !== 'live') ? 'test':''; ?>" class="no-underline"><img src="/ui/img/facebook.svg"><br>Facebook</a></li>
		       <li><a href="/auth/google" class="no-underline"><img src="/ui/img/googleplus.svg"><br>Google</a></li>
		       <li><a href="/auth/github" class="no-underline"><img src="/ui/img/github.svg"><br>Github</a></li>
		       <li><a href="/auth/reddit" class="no-underline"><img src="/ui/img/reddit.svg"><br>Reddit</a></li>
			</ul>
		</div>
    </div>
</section>

<?php
}


?>

<?php if (SERVER =='dev') {
/*
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
*/
?>
<script src="ui/js/jquery.1.10.2.min.js"></script>
<script src="ui/js/jquery.autocomplete.min.js"></script>
<script src="ui/js/headhesive.js"></script>
<?php
}

?>
	<script src="ui/js/min/main-min.js?v=1.0.220"></script>
	</body>
</html>