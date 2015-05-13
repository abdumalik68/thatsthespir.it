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