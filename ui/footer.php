<footer class="footer">
<h1 class="ui-title topline" style="background:white; text-align: left;">Uh?</h1>

	<p>This garden of lights is made for unicorns by a <a href="https://pixeline.be">web designer in Brussels</a>, whose mind needed a place to bathe in all the beautifulities the human mind came up with during our time on Earth. May this place be as enthralling for you as it is for me.<br><img src="ui/img/hand.svg" alt="V for Victory hand sign" class="hand">
	</p>
	<p>
		<a href="http://eepurl.com/bjCZ6f" title="Receive a daily quote from the Spirit in your mailbox">Would you like a Daily quote by email ?</a> - <a href="<?php echo $privacy_url ?>" title="In short: Google Analytics cookies, that's about it.">Privacy policy</a> - <a href="<?php echo $archive_url ?>" title="The Spirit! choses humans as channels. Also known as &lsquo;Authors&rsquo;">All Authors</a>
		</p>
</footer>

	<script src="https://www.google.com/jsapi"></script>
<?php if (SERVER =='dev') {
?>
<script src="ui/js/jquery.1.10.2.min.js"></script>
<script src="ui/js/jquery.autocomplete.min.js"></script>
<?php
}

?>
	<script src="ui/js/<?php echo (SERVER !='dev')? 'min/main-min':'main';?>.js?v=1.0.2"></script>
	</body>
</html>