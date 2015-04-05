<figure class="quote">


	<blockquote cite="<?php echo (isset($quote['source'])) ? $quote['source']: '/quote/'.$quote['id'];  ?>">
		<?php echo (isset($quote['quote'])) ? html_entity_decode($quote['quote']): '';  ?>
	</blockquote>
	<figcaption>

<?php
if($body_class!=='of-author'){
?>
		<div id="photo" data-author="<?php echo $author['fullname'];?>" <?php echo (!empty($author['photo'])) ? 'style="background-image: url('.$upload_folder.'/'. $author['photo'] .');"':'data-photo="none"'; ?>  <?php echo ($author['gender']=='f') ? 'class="woman"':'' ?>>&nbsp;</div>
		<p class="author">– <?php echo ucfirst($author['fullname']);  ?> (<a title="All quotes by <?php echo ucfirst($author['fullname']);  ?>" href="/of/<?= $author['slug']; ?>"><?php echo $author['total'];?></a>)</p>

<?php
}
?>
	</figcaption>
<p class="ui-title quote-meta topline">quote <a href="/quote/view/<?php echo $quote['id']?>">#<?php echo $quote['id']?></a> | 
<?php echo (!empty($quote['source'])) ? '<span class="source"><a href="'.$quote['source'].'" target="_blank">source</a></span>': '';  ?>
| 

<?php
$share_message = $quote['quote']. "\n– ". $author['fullname'] ;
$tweet_version = urlencode(truncate($author['fullname']. ': '.$quote['quote'], 90));
$permalink = WWWROOT.'/quote/view/' . $quote['id'];
?>

<a class="social facebook" href="//www.facebook.com/sharer/sharer.php?u=<?php echo $permalink ?>"><img src="/ui/img/facebook.svg" alt="share this quote on Facebook"></a>
<a class="social twitter" href="http://twitter.com/share?text=<?php echo $tweet_version ?>&url=<?php echo $permalink ?>&hashtags=design_quote"><img src="/ui/img/twitter.svg" alt="share this quote on Twitter"></a>
<a class="social pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo $permalink ?>&media=<?php echo $metatags['image'] ?>&description=<?php echo urlencode($share_message) ?>"><img src="/ui/img/pinterest.svg" alt="share this quote on Pinterest"></a>

<?php if ($user['role']==='admin'){ ?> | <a href="/author/edit/<?php echo $author['slug'] ?>">Edit author</a> <? }?>
	<?php
if(($user['role']==='admin')){
?> | 
<?php
if(($quote['status']=='pending')){
?>
 | <a href="/quote/validate/<?= $quote['id'];?>">Accept quote</a>
<?
}
?>
| <a href="/quote/delete/<?= $quote['id'];?>">Delete quote</a>
| <a href="/quote/edit/<?= $quote['id'];?>">Edit quote</a>
<?php
}
?>
</p>

</figure>