<?php

if (isset($tags) && !empty($tags) && strlen(trim($tags->name)) > 0) {
    ?>
		<h2 class="ui-title topline topic-title">On <?php echo html_entity_decode($tags->name); ?></h2>
		<?php
}
?>
<figure class="quote">
	<blockquote cite="<?php echo (isset($quote->source)) ? $quote->source : '/quote/' . $quote->id; ?>" >
		<span class="guillemets"></span>
		<span class="the-quote"><?php echo (isset($quote->quote)) ? html_entity_decode($quote->quote) : ''; ?></span>
		<span class="pilcrow">|</span>
	</blockquote>
	<figcaption>

<?php
if ($body_class !== 'of-author') {
    ?>
		<div class="photo <?php echo (!$showLargeAvatar) ? 'avatar-small' : ''; ?>"  data-author="<?php echo $author->fullname; ?>" <?php echo (!empty($author->photo)) ? 'style="background-image: url(' . $upload_folder . '/' . $author->photo . ');"' : 'data-photo="none"'; ?>  <?php echo ($author->gender == 'f') ? 'class="woman"' : '' ?>>&nbsp;</div>

		<address  class="author">– <a title="All quotes by <?php echo ucfirst($author->fullname); ?>" href="/of/<?php echo $author->slug; ?>" rel="author"><?php echo ucfirst($author->fullname); ?><br><small class="meta"><?php echo $author->total ?> quote<?php echo ((int) $author->total > 1) ? 's' : ''; ?></small></a></address>

<?php
}
?>
<p><?php

$share_message = urlencode($quote->quote . "\n– " . $author->fullname);
$tweet_version = urlencode(truncate($author->fullname . ': ' . $quote->quote, 90));
$permalink = WWWROOT . '/quote/view/' . $quote->id;

$likers = implode(', ', explode(',', $quote->likers));

?>
<p class="ui-title quote-meta">
	<a href="<?php echo $permalink ?>">#<?php echo $quote->id ?></a>
<?php echo (!empty($quote->source)) ? ' | <span class="source"><a href="' . $quote->source . '" target="_blank">source</a></span>' : ''; ?>
&nbsp;&nbsp;|&nbsp;&nbsp;
	<a rel="nofollow" class="social facebook" href="//www.facebook.com/sharer/sharer.php?u=<?php echo $permalink ?>" title="Share this quote on Facebook"><img src="/assets/img/facebook.svg" alt=""></a>
	<a rel="nofollow" class="social twitter" href="http://twitter.com/share?text=<?php echo $tweet_version ?>&amp;url=<?php echo $permalink ?>&amp;hashtags=design_quote" title="Share this quote on Twitter"><img src="/assets/img/twitter.svg" alt=""></a>
	<a rel="nofollow" class="social pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo $permalink ?>&amp;media=<?php echo $metatags['image'] ?>&amp;description=<?php echo $share_message ?>" title="Share this quote on Pinterest"><img src="/assets/img/pinterest.svg" alt=""></a>
	<a rel="nofollow" class="social linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink ?>&amp;title=<?php echo urlencode($author->fullname) ?>&amp;summary=<?php echo $share_message ?>&amp;source=<?php echo $permalink ?>" title="Share this quote on LinkedIn"><img src="/assets/img/linkedin.svg" alt=""></a>
	<a rel="nofollow" class="social googleplus" href="https://plus.google.com/share?url=<?php echo $permalink ?>" title="Share this quote on Google Plus"><img src="/assets/img/googleplus.svg" alt=""></a>


	<a rel="nofollow" class="social reddit" data-height="420" data-network="reddit" data-width-normal="540" data-width="845" href="//www.reddit.com/submit?url=<?php echo $permalink ?>&amp;title=<?php echo $share_message ?>" href="//www.reddit.com/submit" title="Share this quote on Reddit">
		<img src="/assets/img/reddit.svg" width="19" height="15" alt="">
	</a>

	|
	<a rel="nofollow" class="social favourite <?php echo (LOGGED_IN && $quote->user_likes_it > 0) ? 'liked' : '' ?>" data-quote="<?php echo $quote->id; ?>" href="<?php echo (LOGGED_IN) ? '/favourite/' . $quote->id : CURRENT_URI . '#login-ui'; ?>" title="Favourite this quote so you can easily find it later. <?php echo (!empty($likers)) ? 'Liked by: ' . strip_tags($likers) : ''; ?>">
		<em>Save it ?</em>&nbsp;
		<span class="total_likes" data-likers="<?php echo $likers ?>"><?php echo $quote->total_likes ?></span>
		</a>


<?php if ($user['role'] === 'admin') {?> <a href="/author/edit/<?php echo $author->slug ?>">Edit author</a> <?php }?>
	<?php
if (($user['role'] === 'admin')) {
    ?>
<?php
if (($quote->status == 'pending')) {
        ?>
 | <a href="/quote/validate/<?php echo $quote->id; ?>">Accept quote</a>
<?php
}
    ?>
| <a href="/quote/delete/<?php echo $quote->id; ?>">X Delete quote</a>
| <a href="/quote/edit/<?php echo $quote->id; ?>">Edit quote</a>
<?php
}
?>
</p>

</p>

	</figcaption>
</figure>
