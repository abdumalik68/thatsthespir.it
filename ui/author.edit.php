<form method="post" enctype="multipart/form-data" class="pure-form pure-form-stacked" >
	<h1><?php echo $metatags['title'] ?></h1>

<?php
if(isset($errors) && count($errors)>0){
	?>
	<div class="message">
	<h2>Ooops!</h2>
	<?php 
		foreach($errors as $e){
			echo $e;
		}
	?></div>
<?
}

?>

	<label for="fullname">Full name:</label>
	<input type="text" id="fullname" size="20" name="fullname" value="<?php echo $post['fullname']; ?>"></li>

	<label for="gender">Gender:</label>
	<select name="gender" id="gender">
		<option value="f" <?php echo (!empty($post['gender']) && $post['gender']==='f') ? 'selected':'';  ?>>Female</option>
		<option value="m" <?php echo (!empty($post['gender']) && $post['gender']==='m') ? 'selected':'';  ?>>Male</option>
		<option value="unknown" <?php echo (!empty($post['gender']) && $post['gender']==='unknown') ? 'selected':'';  ?>>Unknown</option>
	</select>

	<label for="photoinput">Portrait image: <small>preferably square, minimum 400px wide. It will be automatically dessaturated.</small></label>
	<input type="file" id="photoinput" name="photo">
	<?php if(strlen($post['photo'])>0){ ?>
	<img src="<?php echo $upload_folder.'/'.$post['photo'] ?>" width="<?php echo $image_width; ?>">
	<?php
	}else{
	?>
<small><a href="https://www.google.com/search?q=<?php echo urlencode($post['fullname']) ?>&es_sm=91&source=lnms&tbm=isch&sa=X&ei=okNEVJeuIMqwPLChgaAL&ved=0CAgQ_AUoAQ&biw=1279&bih=679&gws_rd=cr#q=<?php echo urlencode($post['fullname']) ?>&tbs=ic:gray,itp:face,islt:vga,isz:m&tbm=isch" target="_blank">Find one on Google Images</a></small><br>
<?php
}?>
	<input type="submit" class="pure-button pure-button-primary"  value="Save">
    </form>
<?php if (!empty($post['id'])){
?><p>... or <a href="/of/<?php echo $post['slug']; ?>">just view this author</a></p>

<?
}?>
