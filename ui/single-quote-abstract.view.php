<?php
	$permalink = WWWROOT.'/quote/view/' . $quote['id'];
	
	$no_avatar = ($author['gender']=='f') ? 'woman.svg' : 'man.svg';
	$avatar = (!empty($author['photo'])) ? $upload_folder.'/'. $author['photo'] : 'ui/img/'.$no_avatar;
	$avatar = WWWROOT.'/'. $avatar;
?>
<div class="quote-short"><em><time datetime="<?php echo date(DATE_W3C); ?>">On <?php echo date('F j, Y', strtotime($quote['creation_date'])); ?></time></em><a title="See all quotes by <?php echo ucfirst($author['fullname']);  ?>" href="/of/<?php echo $author['slug']; ?>" rel="author"><div class="avatar-small" style="background-image: url(<?php echo $avatar;?>)"></div>
<strong><?php
	// Mr. or Ms. ? 
	echo ($author['gender']=='f') ? 'Ms.' : 'Mr.'; ?> <?php echo ucfirst($author['fullname']);  ?></strong></a> <em>said:</em> 

	<blockquote cite="<?php echo  $permalink  ?>">
		<?php echo (isset($quote['quote'])) ? html_entity_decode($quote['quote']): '';  ?>
	</blockquote>
<p class="ui-title quote-meta" >
	&nbsp;&nbsp;quote <a href="/quote/view/<?php echo $quote['id']?>">#<?php echo $quote['id']?></a>
<?php 
	echo (!empty($quote['source'])) ? ' | <span class="source"><a href="'.$quote['source'].'" target="_blank">source</a></span> | ': ''; 
	if ($user['role']==='admin'){ ?> | <a href="/author/edit/<?php echo $author['slug'] ?>">Edit author</a> <?php }?>
	<?php
if(($user['role']==='admin')){
?>
<?php
	if(($quote['status']=='pending')){
?>
 | <a href="/quote/validate/<?php echo $quote['id'];?>">Accept quote</a>
<?php
	}
?>
| <a href="/quote/delete/<?php echo $quote['id'];?>">X Delete quote</a>
| <a href="/quote/edit/<?php echo $quote['id'];?>">Edit quote</a>
<?php
}
?>
</p>
</div>
