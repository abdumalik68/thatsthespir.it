
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
<p class="ui-title quote-meta topline">quote <a href="/quote/view/<?php echo $quote['id']?>">#<?php echo $quote['id']?></a> <?php echo (!empty($quote['source'])) ? '<span class="source"> | <a href="'.$quote['source'].'" target="_blank">source</a></span>': '';  ?><?php if ($user['role']==='admin'){ ?> | <a href="/author/edit/<?php echo $author['slug'] ?>">Edit author</a> <? }?>
	<?php
if(($user['role']==='admin')){
?>
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