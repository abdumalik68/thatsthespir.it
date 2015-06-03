<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <title>T̩̤h̰̠̫̬͖̟̼a̴̪̣t͢'̴̱̺͙͕̗͕̝s̢̤̥̩̯̖ ̬̟̝͔̯̼̼T̜͘ḩ̫̪̮̙͕͎e̝͎̯͖͖̺̰ ̠̭͕̭̰͍S͉p̨̝̯͔̬̳ͅí͚͓̳ri̦̥t͙͔!̠̥̪̪͞ͅ</title>
        

		<base href="<?php echo $SCHEME.'://'.$HOST.'/'; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script rel="dns-prefetch prerender" src="//use.typekit.net/opz3npz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>

        <link rel="stylesheet" href="ui/css/main.css?v=1.0.26">
		<link rel="alternate" title="RSS of That's The Spirit!" href="/feed" type="application/rss+xml">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>

<body>
	<div class="header">
		<div class="custom-wrapper pure-g" id="menu">
    			<div class="pure-u-1 pure-u-md-1-3">
    	    			<div class="pure-menu">
					<a id="logo" class="pure-menu-heading custom-brand" href="/">That's the spirit! <br><small>Inspirational quotes for the creative soul.</small></a>
				</div>
			</div>	
			<div class="pure-u-1 pure-u-md-2-3" style="text-align:right;">
        		<div class="pure-menu pure-menu-horizontal custom-can-transform">
					<ul id="global-menu" class="pure-menu-list">
           			<li class="pure-menu-item">
				<a href="/daily" class="pure-menu-link" title="Receive a daily quote from the Spirit in your mailbox">Daily</a>
			</li>
			<li class="pure-menu-item"><a href="/latest" id="latest-quotes" class="pure-menu-link">Latest</a></li>
						<li class="pure-menu-item">
							<a href="/quote/add" id="suggest-quote" class="pure-menu-link">Suggest a quote</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<div class="white-background">
	<div class="content-wrapper">
	    	<div class="content">
			<article class="error-404">
				<h1 class="ui-title topline" style="background:white;">This address is unknown (the infamous 404).</h1>
				<div class="content">
					<blockquote style="font-size:200%"><span class="the-quote">Enjoy the silence.</span></blockquote>
				</div>	
			</article>
		</div>
		<p class="center"><a href="/" style="color:#111">Or, you could enjoy a quote.</a></p>

	</div>

<script>var google;</script>
	<script src="https://www.google.com/jsapi"></script>
<?php if (SERVER =='dev') {
?>
<script src="ui/js/jquery.1.10.2.min.js"></script>
<script src="ui/js/jquery.autocomplete.min.js"></script>
<script src="ui/js/jquery.shuffleLetters.js"></script>
<?php
}

?>
	<script src="ui/js/<?php echo (SERVER !='dev')? 'min/main-min':'main';?>.js?v=1.0.4"></script>
	</body>
</html>