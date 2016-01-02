<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <title><?php echo truncate('Inspiring quote: ' . htmlentities(strip_tags(html_entity_decode($metatags['title']))), 45); ?></title>
        <link rel="publisher" href="https://plus.google.com/u/0/b/109858177150611361742/+PixelineBe/"/>
        <?php //include 'newrelic.tracking-speed.php'; ?>
        <meta name="description" content="<?php echo htmlentities(strip_tags(html_entity_decode($metatags['description']))); ?>">
		<meta property="og:title" content="<?php echo htmlentities(strip_tags(html_entity_decode($metatags['title']))); ?>">
		<meta property="og:site_name" content="<?php echo htmlentities(strip_tags(html_entity_decode($metatags['site_name']))); ?>">
		<meta property="og:image" content="<?php echo $metatags['image']; ?>">
		<meta property="og:image:width" content="<?php echo $metatags['image:width']; ?>">
		<meta property="og:image:height" content="<?php echo $metatags['image:height']; ?>">
		<meta property="og:url" content="<?php echo $metatags['url']; ?>">
		<meta property="fb:app_id" content="381323445386729">
		<meta property="og:description" content="<?php echo htmlentities(strip_tags(html_entity_decode($metatags['description']))); ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="<?php echo htmlentities(strip_tags(html_entity_decode($metatags['site_name']))); ?>">
		<meta name="twitter:description" content="<?php echo htmlentities(strip_tags(html_entity_decode($metatags['description']))); ?>">
		<meta name="twitter:image" content="<?php echo $metatags['image']; ?>">

		<meta name="google-site-verification" content="N00zI7PD13iyNPB3-1T6o2J-TrU6S2nXH-Nl522Vhi0">
		<meta name="msvalidate.01" content="84BB1D2AE4A4E377438FF21FDA9B95EF">
		<base href="<?php echo $SCHEME.'://'.$HOST.'/'; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script rel="dns-prefetch prerender" src="//use.typekit.net/opz3npz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
        <link rel="stylesheet" href="ui/css/main.css?v=1.0.32">
		<link rel="alternate" title="RSS of That's The Spirit!" href="/feed" type="application/rss+xml">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->

		<link rel="apple-touch-icon" sizes="57x57" href="ui/img/icons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="ui/img/icons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="ui/img/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="ui/img/icons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="ui/img/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="ui/img/icons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="ui/img/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="ui/img/icons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="ui/img/icons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="ui/img/icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="ui/img/icons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="ui/img/icons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="ui/img/icons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="ui/img/icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="ui/img/icons/manifest.json">
		<link rel="shortcut icon" href="ui/img/icons/favicon.ico">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="ui/img/icons/mstile-144x144.png">
		<meta name="msapplication-config" content="ui/img/icons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

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
			if(isset($_SESSION['user']['fullname'])){
				echo '<li id="user-avatar"><img src="'.$_SESSION['user']['image'].'" ><span class="user-name">'.$_SESSION['user']['fullname'].'</span>
				<a href="/logout" class="logout-link">Log out</a>
				</li>';
			}

			if ($user['role']==='admin'){ ?>
						<li class="pure-menu-item"><a href="/fix-author-totals" class="pure-menu-link">Fix totals</a></li>
						<li class="pure-menu-item" id="review-pending-quotes"><a href="<?= $pending_url ?>" class="pure-menu-link">Review Pending quotes</a></li>
			<?php
			}
			?>
						<li class="pure-menu-item <?= ($current_url=='/daily') ? 'pure-menu-selected': '';?>" >
							<a href="/daily" class="pure-menu-link badge-cta" title="Receive a daily quote from the Spirit in your mailbox">Daily <?php if(($current_url !='/daily') && (!isset($_COOKIE['badge-clicked']) || $_COOKIE['badge-clicked'] != '1' )){?><span class="badge" title="You (will) have new mail!">1</span><?php } ?></a>
						</li>
						<li class="pure-menu-item <?= ($current_url=='/latest') ? 'pure-menu-selected': '';?>"><a href="<?php echo $latest_url;?>" id="latest-quotes" class="pure-menu-link">Latest</a></li>
						<li class="pure-menu-item"><a href="/quote/add" id="suggest-quotes" class="pure-menu-link">Suggest a quote</a></li>
						<li class="pure-menu-item"><a href="/" id="another-quote-button">Give me a quote, please</a></li>	

					</ul>
				</div>
			</div>
		</div>
	</div>