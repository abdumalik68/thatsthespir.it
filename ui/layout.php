<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $metatags['title']; ?> - That's the spirit!</title>
        <meta name="description" content="<?php echo $metatags['description']; ?>">
		<meta property="og:title" content="<?php echo $metatags['title']; ?>">
		<meta property="og:site_name" content="<?php echo $metatags['site_name']; ?>">
		<meta property="og:image" content="<?php echo $metatags['image']; ?>">
		<meta property="og:image:width" content="<?php echo $metatags['image:width']; ?>">
		<meta property="og:image:height" content="<?php echo $metatags['image:height']; ?>">
		<meta property="og:url" content="<?php echo $metatags['url']; ?>">
		<meta property="og:description" content="<?php echo $metatags['description']; ?>">
		<meta property="og:type" content="article">
		<meta name="google-site-verification" content="N00zI7PD13iyNPB3-1T6o2J-TrU6S2nXH-Nl522Vhi0" />

		<base href="<?php echo $SCHEME.'://'.$HOST.'/'; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="//use.typekit.net/opz3npz.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>

        <link rel="stylesheet" href="ui/css/main.css?v=1.0.2">

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
					<a id="logo" class="pure-menu-heading custom-brand" href="/">That's the spirit! <br><small>Inspiring quotes for the creative soul.</small></a>
				</div>
			</div>	
			<div class="pure-u-1 pure-u-md-2-3" style="text-align:right;">
        		<div class="pure-menu pure-menu-horizontal custom-can-transform">
					<ul id="global-menu" class="pure-menu-list">
            <?php
			if ($user['role']==='admin'){ ?>
						<li class="pure-menu-item"><a href="/fix-author-totals" class="pure-menu-link">Fix totals</a></li>
						<li class="pure-menu-item" id="review-pending-quotes"><a href="/quotes/pending" class="pure-menu-link">Review Pending quotes</a></li>
			<?php
			}
			?>
						<li class="pure-menu-item" id="suggest-quote"><a href="/quote/add" class="pure-menu-link"><img id="add-button-icon" src="/ui/img/add-button.svg" alt="Suggest a quote"><b>Suggest a quote</b></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<div class="white-background">
	<div class="content-wrapper">
    	<div class="content">
			<?php echo $this->render($content); ?>
    	</div>
	</div>
</div>
<div class="white-background">

<section class="search">
	<div class="content">
		<h1 class="ui-title topline">search</h1>
		<div style="position: relative; height: 80px;">
            <input type="text" name="s" id="autocomplete-ajax" style="position: absolute; z-index: 2; background: transparent;width:100%;max-width:95%" placeholder="✍ Search for a quote or author..." value="<?php echo $query ?>">
            <input type="text" name="s" id="autocomplete-ajax-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;width:95%;max-width:100%;">
        </div>
	</div>
</section>

<section class="all-authors">
	<div class="content">
	<h1 class="ui-title topline">All authors</h1>
	<ol>
	<?php
	foreach($all_authors as $a){
			$plural = ((int)$a['total']>1) ? 's':'';
		echo '<li class="'.$a['gender'].'"><a href="/of/'.$a['slug'].'" title="All quotes by '.$a['fullname'].'"><span class="author-name">'.$a['fullname'].'</span> <span class="author-total">contributed '.$a['total'].' quote'.$plural.'.</span></a></li>' ;
	}
	?>
	</ol>
	</div>
</section>
</div>

<footer class="footer l-box is-center">
        This garden of lights is made by a <a href="https://pixeline.be">guy</a> whose mind needed a place to bathe in all the beautifulities the human mind came up with during our time on Earth. May this place be as enthralling for you as it is for me.<br>
        You can <a href="http://eepurl.com/bjCZ6f">receive the latest quotes added to the Spirit in your mailbox</a>.<br>
		<img src="ui/img/hand.svg" alt="V for Victory hand sign" class="hand">
    </footer>

</div>


	<script src="https://www.google.com/jsapi"></script>
<?php if (SERVER =='dev') {
?>
<script src="ui/js/jquery.1.10.2.min.js"></script>
<script src="ui/js/jquery.autocomplete.min.js"></script>
<?php
}

?>
	<script src="ui/js/<?php echo (SERVER !='dev')? 'min/main-min':'main';?>.js?v=1.0.0"></script>
	</body>
</html>