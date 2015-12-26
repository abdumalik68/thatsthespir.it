<footer class="footer">
<h1 class="ui-title topline" style="background:white; text-align: left;">Uh?</h1>

	<p>Made by some <a href="https://pixeline.be" title="Best Brussels web agency">web designer in Brussels</a>.<br><img src="ui/img/hand.svg" alt="V for Victory hand sign" class="hand">
	</p>
	<p>
		<a href="/daily" title="Receive a daily quote from the Spirit in your mailbox">Would you like a Daily quote by email ?</a> - <a href="<?php echo $privacy_url ?>" title="In short: Google Analytics cookies, that's about it.">Privacy policy</a> - <a href="<?php echo $archive_url ?>" title="The Spirit! choses humans as channels. Also known as &lsquo;Authors&rsquo;">All Authors</a>
		</p>
</footer>
<?php if (SERVER =='dev') {
?>
<script src="ui/js/jquery.1.10.2.min.js"></script>
<script src="ui/js/jquery.autocomplete.min.js"></script>
<script src="ui/js/headhesive.js"></script>
<?php
}

?>
	<script src="ui/js/min/main-min.js?v=1.0.13"></script>
	</body>
</html>