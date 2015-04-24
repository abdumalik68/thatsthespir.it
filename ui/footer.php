
<footer class="footer l-box is-center">
	<p>This garden of lights is made for unicorns by a <a href="https://pixeline.be">web designer in Brussels</a>, whose mind needed a place to bathe in all the beautifulities the human mind came up with during our time on Earth. May this place be as enthralling for you as it is for me.<br><img src="ui/img/hand.svg" alt="V for Victory hand sign" class="hand">
	</p>
	<p>
		<a href="http://eepurl.com/bjCZ6f" title="Receive the latest quotes added to the Spirit in your mailbox">Newsletter</a> - <a href="<?php echo $privacy_url ?>">Privacy policy</a>
		</p>
</footer>

<div id="awwwards" class="nominee black bottom right">
<a href="http://www.awwwards.com/best-websites/that-s-the-spirit/" target="_blank">Awwwards</a>
</div>

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