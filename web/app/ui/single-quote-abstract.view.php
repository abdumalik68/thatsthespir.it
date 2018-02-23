<?php
$permalink = WWWROOT . '/quote/view/' . $quote['id'];

$no_avatar = ($author['gender'] == 'f') ? 'woman.svg' : 'man.svg';
$avatar = (!empty($author['photo'])) ? $upload_folder . '/' . $author['photo'] : 'ui/img/' . $no_avatar;
$avatar = WWWROOT . '/' . $avatar;
?>
<div class="quote-short">
	<div class="avatar-small" style="background-image: url(<?php echo $avatar; ?>)"></div><br><br>
	<time datetime="<?php echo date(DATE_W3C); ?>">On <?php echo date('F j, Y', strtotime($quote['creation_date'])); ?></time><a title="See all quotes by <?php echo ucfirst($author['fullname']); ?>" href="/of/<?php echo $author['slug']; ?>" rel="author">
<strong><?php
// Mr. or Ms. ?
echo ($author['gender'] == 'f') ? 'Ms.' : 'Mr.'; ?> <?php echo ucfirst($author['fullname']); ?></strong></a> said:

	<blockquote cite="<?php echo $permalink ?>"><span class="guillemets"></span>
		<span class="the-quote">
		<?php echo (isset($quote['quote'])) ? html_entity_decode($quote['quote']) : ''; ?></span><span class="pilcrow">|</span>
	</blockquote>
<p>
</p>
<p class="ui-title quote-meta" >
	&nbsp;&nbsp;quote <a href="/quote/view/<?php echo $quote['id'] ?>">#<?php echo $quote['id'] ?></a>
<?php
echo (!empty($quote['source'])) ? ' | <span class="source"><a href="' . $quote['source'] . '" target="_blank">source</a></span> | ' : '';
if ($user['role'] === 'admin') { ?> | <a href="/author/edit/<?php echo $author['slug'] ?>">Edit author</a> <?php }?> |

<?php
$share_message = urlencode($quote['quote'] . "\n– " . $author['fullname']);
$tweet_version = urlencode(truncate($author['fullname'] . ': ' . $quote['quote'], 90));
$permalink = WWWROOT . '/quote/view/' . $quote['id'];
?>

<a  rel="nofollow" class="social facebook" href="//www.facebook.com/sharer/sharer.php?u=<?php echo $permalink ?>"><img src="/assets/img/facebook.svg" alt="share this quote on Facebook"></a>
<a rel="nofollow" class="social twitter" href="http://twitter.com/share?text=<?php echo $tweet_version ?>&amp;url=<?php echo $permalink ?>&amp;hashtags=design_quote"><img src="/assets/img/twitter.svg" alt="share this quote on Twitter"></a>
<a rel="nofollow" class="social pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo $permalink ?>&amp;media=<?php echo $metatags['image'] ?>&amp;description=<?php echo $share_message ?>"><img src="/assets/img/pinterest.svg" alt="share this quote on Pinterest"></a>
<a rel="nofollow" class="social linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink ?>&amp;title=<?php echo urlencode($author['fullname']) ?>&amp;summary=<?php echo $share_message ?>&amp;source=<?php echo $permalink ?>" ><img src="/assets/img/linkedin.svg" alt="share this quote on LinkedIn"></a>
<a rel="nofollow" class="social googleplus" href="https://plus.google.com/share?url=<?php echo $permalink ?>"><img src="/assets/img/googleplus.svg" alt="share this quote on Google Plus"></a>


	<?php
if (($user['role'] === 'admin')) {
    ?>
<?php
if (($quote['status'] == 'pending')) {
        ?>
 | <a href="/quote/validate/<?php echo $quote['id']; ?>">Accept quote</a>
<?php
}
    ?>
| <a href="/quote/delete/<?php echo $quote['id']; ?>">X Delete quote</a>
| <a href="/quote/edit/<?php echo $quote['id']; ?>">Edit quote</a>
<?php
}
?>
</p>
</div>
