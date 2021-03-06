<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
	<meta charset="utf-8">
	<title><?php echo truncate(htmlentities(strip_tags(html_entity_decode($metatags['title']))), 45); ?></title>
	<link rel="publisher" href="https://plus.google.com/u/0/b/109858177150611361742/+PixelineBe/" />
	<link rel="canonical" href="<?php echo $metatags['url']; ?>">
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
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="application/ld+json">
		{
			"@context": "https://schema.org/",
			"@type": "WebSite",
			"name": "That's The Spirit!",
			"url": "https://thatsthespir.it",
			"potentialAction": {
				"@type": "SearchAction",
				"target": "https://thatsthespir.it/search?query={search_term_string}",
				"query-input": "required name=search_term_string"
			}
		}
	</script>


	<script>
		(function(d) {
			var config = {
					kitId: 'opz3npz',
					scriptTimeout: 3000,
					async: true
				},
				h = d.documentElement,
				t = setTimeout(function() {
					h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
				}, config.scriptTimeout),
				tk = d.createElement("script"),
				f = false,
				s = d.getElementsByTagName("script")[0],
				a;
			h.className += " wf-loading";
			tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
			tk.async = true;
			tk.onload = tk.onreadystatechange = function() {
				a = this.readyState;
				if (f || a && a != "complete" && a != "loaded") return;
				f = true;
				clearTimeout(t);
				try {
					Typekit.load(config)
				} catch (e) {}
			};
			s.parentNode.insertBefore(tk, s)
		})(document);
	</script>
	<link rel="alternate" title="RSS of That's The Spirit!" href="/feed" type="application/rss+xml">
	<link rel="apple-touch-icon" sizes="57x57" href="/assets/img/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/img/icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/img/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/img/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/img/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/img/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/img/icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/icons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/assets/img/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/assets/img/icons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="/assets/img/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/assets/img/icons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/assets/img/icons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/assets/img/icons/manifest.json">
	<link rel="shortcut icon" href="/assets/img/icons/favicon.ico">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/assets/img/icons/mstile-144x144.png">
	<meta name="msapplication-config" content="/assets/img/icons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="/assets/css/main.css?v=1.0.46">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162823-28"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-162823-28');
	</script>
</head>

<body class="<?php echo $body_class ?>">
	<div class="header">
		<div class="custom-wrapper pure-g" id="js-main-menu">
			<div class="pure-u-1 pure-u-md-1-3">
				<div class="pure-menu">
					<a id="logo" class="pure-menu-heading custom-brand" href="/">That's the spirit! <br><small>Inspirational quotes for the creative soul.</small></a>
					<a href="javascript:void(0)" class="custom-toggle" id="js-toggle"><s class="bar"></s><s class="bar"></s></a>
				</div>
			</div>
			<div class="pure-u-1 pure-u-md-2-3 global-menu-wrapper">
				<div class="pure-menu pure-menu-horizontal js-custom-can-transform">
					<ul id="global-menu" class="pure-menu-list">
						<?php if (LOGGED_IN) { ?>
							<li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
								<a href="javascript:void(0)" id="user-avatar" class="pure-menu-link no-underline">
									<?php if (!empty($_SESSION['user']['image'])) { ?>
										<img src="<?= $_SESSION['user']['image']; ?>">
									<?php
									} else if (!empty($_SESSION['user']['fullname'])) {
									?>
										<strong><?= $_SESSION['user']['fullname'] ?></strong>
									<?php	} else {
									?>
										<strong>You</strong>
									<?php
									}
									?>
								</a>
								<ul class="pure-menu-children">
									<li class="pure-menu-item <?= ($current_url == '/of-mine') ? 'pure-menu-selected' : ''; ?>"><a href="/of-mine" class="pure-menu-link">My ??? quotes</a></li>
									<li class="pure-menu-item <?= ($current_url == '/latest') ? 'pure-menu-selected' : ''; ?>"><a href="<?php echo $latest_url; ?>" id="latest-quotes" class="pure-menu-link">Latest</a></li>
									<?php
									if ($user['role'] === 'admin') { ?>
										<li class="pure-menu-item"><a href="/fix-author-totals" class="pure-menu-link">Fix totals</a></li>
										<li class="pure-menu-item" id="review-pending-quotes"><a href="<?= $pending_url ?>" class="pure-menu-link">Review Pending quotes</a></li>
									<?php
									}
									?>
									<li class="pure-menu-item"><a href="/logout" class="pure-menu-link logout-link">Log out</a></li>
								</ul>
							</li>
						<?php
						}
						?>
						<li class="pure-menu-item <?= ($current_url == '/daily') ? 'pure-menu-selected' : ''; ?>">
							<a href="/daily" class="pure-menu-link badge-cta underline" title="Receive a daily quote from the Spirit in your mailbox">Daily <?php if (($current_url != '/daily') && (!isset($_COOKIE['badge-clicked']) || $_COOKIE['badge-clicked'] != '1')) { ?><span class="badge" title="You (will) have new mail!">1</span><?php } ?></a>
						</li>
						<li class="pure-menu-item"><a href="<?php echo (LOGGED_IN) ? '/quote/add' : CURRENT_URI . '#login-ui'; ?>" id="suggest-quotes" class="pure-menu-link underline" title="Do you know a great quote that's not already in The Spirit?">Suggest a quote</a></li>
						<li class="pure-menu-item"><a href="/popular" id="popular-quotes" class="pure-menu-link underline" title="The Spirit's Twenty most popular quotes.">Favs chart</a></li>
						<li class="pure-menu-item">
							<a href="/search" id="search-quotes" class="pure-menu-link search-icon" title="The Spirit's Twenty most popular quotes.">
								<?php require '../public/assets/img/search.svg'; ?></a></li>

					</ul>
				</div>
			</div>
		</div>
	</div>
