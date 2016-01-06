<footer class="footer">
<h1 class="ui-title topline" style="background:white; text-align: left;">Uh?</h1>

	<p>Made by some <a href="https://pixeline.be" title="Best Brussels web agency">web designer in Brussels</a>.<br><img src="ui/img/hand.svg" alt="V for Victory hand sign" class="hand">
	</p>
	<p>
		<a href="/daily" title="Receive a daily quote from the Spirit in your mailbox">Would you like a Daily quote by email ?</a> - <a href="<?php echo $privacy_url ?>" title="In short: Google Analytics cookies, that's about it.">Privacy policy</a> - <a href="<?php echo $archive_url ?>" title="The Spirit! choses humans as channels. Also known as &lsquo;Authors&rsquo;">All Authors</a>
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
	       <p>To save this quote, you need to log in the Spirit! first via one of these services. It only takes a click and you're good to go.</p>
	       <ul class="single-signon-providers">
		       <li><a href="/auth/facebook<?php echo (SERVER !== 'live') ? '-test':''; ?>"><img src="/ui/img/facebook.svg"><br>Facebook</a></li>
		       <li><a href="/auth/google"><img src="/ui/img/googleplus.svg"><br>Google</a></li>
		       <li><a href="/auth/github"><img src="/ui/img/github.svg"><br>Github</a></li>
			</ul>
		</div>
    </div>
</section>

<?php
}


?>

<?php if (SERVER =='dev') {
?>
<script src="ui/js/jquery.1.10.2.min.js"></script>
<script src="ui/js/jquery.autocomplete.min.js"></script>
<script src="ui/js/headhesive.js"></script>
<?php
}

?>
	<script src="ui/js/min/main-min.js?v=1.0.14"></script>
	</body>
</html>