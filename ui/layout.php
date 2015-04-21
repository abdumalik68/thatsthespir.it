<?php include 'header.php'; ?>

<div class="white-background">
	<div class="content-wrapper">
    	<div class="content">
			<?php echo $this->render($content); ?>
    	</div>
	</div>
	<p class="center"><a href="/" id="another-quote-button">Another quote, please</a></p>
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

<?php include 'footer.php'; ?>