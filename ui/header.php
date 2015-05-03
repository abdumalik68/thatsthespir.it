<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <title><?php echo strip_tags(html_entity_decode($metatags['title'])); ?></title>
        <meta name="description" content="<?php echo strip_tags(html_entity_decode($metatags['description'])); ?>">
		<meta property="og:title" content="<?php echo strip_tags(html_entity_decode($metatags['title'])); ?>">
		<meta property="og:site_name" content="<?php echo strip_tags(html_entity_decode($metatags['site_name'])); ?>">
		<meta property="og:image" content="<?php echo $metatags['image']; ?>">
		<meta property="og:image:width" content="<?php echo $metatags['image:width']; ?>">
		<meta property="og:image:height" content="<?php echo $metatags['image:height']; ?>">
		<meta property="og:url" content="<?php echo $metatags['url']; ?>">
		<meta property="og:description" content="<?php echo strip_tags(html_entity_decode($metatags['description'])); ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="<?php echo strip_tags(html_entity_decode($metatags['site_name'])); ?>">
		<meta name="twitter:description" content="<?php echo strip_tags(html_entity_decode($metatags['description'])); ?>">
		<meta name="twitter:image" content="<?php echo $metatags['image']; ?>">

		<meta name="google-site-verification" content="N00zI7PD13iyNPB3-1T6o2J-TrU6S2nXH-Nl522Vhi0">
		<meta name="msvalidate.01" content="84BB1D2AE4A4E377438FF21FDA9B95EF">
		<base href="<?php echo $SCHEME.'://'.$HOST.'/'; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script rel="dns-prefetch prerender" src="//use.typekit.net/opz3npz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>

        <link rel="stylesheet" href="ui/css/main.css?v=1.0.9">
		<link rel="alternate" title="RSS of That's The Spirit!" href="/feed" type="application/rss+xml">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body class="<?php echo $body_class ?>">
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
            <?php
			if ($user['role']==='admin'){ ?>
						<li class="pure-menu-item"><a href="/fix-author-totals" class="pure-menu-link">Fix totals</a></li>
						<li class="pure-menu-item" id="review-pending-quotes"><a href="<?= $pending_url ?>" class="pure-menu-link">Review Pending quotes</a></li>
			<?php
			}
			?>
			<li class="pure-menu-item">
							<a href="<?php echo $latest_url;?>" id="latest-quotes" class="pure-menu-link">Latest</a>
						</li>
						<li class="pure-menu-item">
							<a href="/quote/add" id="suggest-quote" class="pure-menu-link">Suggest a quote</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>