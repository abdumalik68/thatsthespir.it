
<form method="post" class="pure-form pure-form-stacked" >
<h1>Edit this quote</h1>

<?php
if(!empty($message)){
?>
	<div class="message"><?php echo $message ; ?></div>
<?php
}
?>
<label for="author_id">Author:</label> <br>
<!--
	<input class="awesomplete" list="author-list" name="author_id" id="author_id">
	<datalist id="author-list">
-->
<select name="author_id" id="author_id" required >
<?php

if(count($authors)>0){
	foreach ($authors as $a){
		$selected = ($quote['author_id'] == $a['id']) ? 'selected': '';
		echo '<option value="'.$a['id'].'" '.$selected.'>'.$a['fullname'];
	}
}
?>
</select>
<p>Not in this list? <a href="/author/add">Create a new Author</a></p>
<label>Source: <small>(a url)</small> <br><input name="source" placeholder="Don't forget the http://" class="pure-input-1-3" type="url" value="<?php echo (isset($quote['source'])) ? $quote['source']: '';  ?>"></label>
<label>Quote: <br><textarea name="quote" placeholder="Write here thy quote, my friend." rows="5" required class="pure-input-1-3"><?php echo (isset($quote['quote'])) ? $quote['quote']: '';  ?></textarea></label>

<?php if($user['role']==='admin'){
?>
<label>Status:
			<select name="status">
				<option value="pending" <?php echo ($quote['status'] == 'pending')? "selected":'';  ?> >Pending</option>
				<option value="online" <?php echo ($quote['status'] == 'online')? "selected":'';  ?>>Online</option>
			</select>
		</label>


<?php
}?>

<input type="submit"  class="pure-button pure-button-primary" value="Save">


</form>
<?php if($body_class=='quote-edit'){
?>
	<p>... or <a href="/quote/view/<?php echo $quote['id'];?>/">just view this beautiful quote</a></p>
<?php
}
