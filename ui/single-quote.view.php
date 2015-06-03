<?php

	if(isset($tags) && !empty($tags) && strlen(trim($tags->name))>0){
		?>
		<h2 class="topline topic-title">On <?php echo html_entity_decode($tags->name) ; ?></h2>
		<?
	}
	?>
<figure class="quote">
	<blockquote cite="<?php echo (isset($quote->source)) ? $quote->source: '/quote/'.$quote->id;  ?>" >
		<span class="guillemets"></span>
		<span class="the-quote"><?php echo (isset($quote->quote)) ? html_entity_decode($quote->quote): '';  ?></span>
		<span class="pilcrow">|</span>
	</blockquote>
	<figcaption>

<?php
if($body_class!=='of-author'){
?>
		<div class="photo <?php echo (!$showLargeAvatar) ? 'avatar-small':''; ?>"  data-author="<?php echo $author->fullname;?>" <?php echo (!empty($author->photo)) ? 'style="background-image: url('.$upload_folder.'/'. $author->photo .');"':'data-photo="none"'; ?>  <?php echo ($author->gender=='f') ? 'class="woman"':'' ?>>&nbsp;</div>

		<address  class="author">– <a title="All quotes by <?php echo ucfirst($author->fullname);  ?>" href="/of/<?php echo $author->slug; ?>" rel="author"><?php echo ucfirst($author->fullname);  ?><br><small class="meta"><?php echo $author->total ?> quote<?php echo ((int)$author->total>1) ? 's':''; ?></small></a></address>

<?php
}
?>
<p><?php
$share_message = urlencode($quote->quote. "\n– ". $author->fullname );
$tweet_version = urlencode(truncate($author->fullname. ': '.$quote->quote, 90));
$permalink = WWWROOT.'/quote/view/' . $quote->id;
?>
<p class="ui-title quote-meta topline"><a href="<?php echo $permalink ?>">#<?php echo $quote->id?></a>
<?php echo (!empty($quote->source)) ? ' | <span class="source"><a href="'.$quote->source.'" target="_blank">source</a></span>': '';  ?>
&nbsp;&nbsp;|&nbsp;&nbsp;
<a class="social facebook" href="//www.facebook.com/sharer/sharer.php?u=<?php echo $permalink ?>"><img src="/ui/img/facebook.svg" alt="share this quote on Facebook"></a>
<a class="social twitter" href="http://twitter.com/share?text=<?php echo $tweet_version ?>&amp;url=<?php echo $permalink ?>&amp;hashtags=design_quote"><img src="/ui/img/twitter.svg" alt="share this quote on Twitter"></a>
<a class="social pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo $permalink ?>&amp;media=<?php echo $metatags['image'] ?>&amp;description=<?php echo $share_message ?>"><img src="/ui/img/pinterest.svg" alt="share this quote on Pinterest"></a>
<a class="social linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink ?>&amp;title=<?php echo urlencode($author->fullname) ?>&amp;summary=<?php echo $share_message ?>&amp;source=<?php echo $permalink ?>" ><img src="/ui/img/linkedin.svg" alt="share this quote on LinkedIn"></a>
<a class="social googleplus" href="https://plus.google.com/share?url=<?php echo $permalink ?>"><img src="/ui/img/googleplus.svg" alt="share this quote on Google Plus"></a>


<?php if ($user['role']==='admin'){ ?> | <a href="/author/edit/<?php echo $author->slug ?>">Edit author</a> <?php }?>
	<?php
if(($user['role']==='admin')){
?>
<?php
	if(($quote->status=='pending')){
?>
 | <a href="/quote/validate/<?php echo $quote->id;?>">Accept quote</a>
<?php
	}
?>
| <a href="/quote/delete/<?php echo $quote->id;?>">X Delete quote</a>
| <a href="/quote/edit/<?php echo $quote->id;?>">Edit quote</a>
<?php
}
?>
</p>

</p>	

	</figcaption>
</figure>
