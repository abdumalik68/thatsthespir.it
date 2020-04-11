<form method="post" class="pure-form pure-form-stacked" style="margin:auto;width:100%;max-width:600px;">
	<h1><?php echo ($body_class == 'quote-edit') ? 'Edit this quote' : 'Suggest a quote'; ?></h1>
	<?php
	if (!empty($message)) {
	?>
		<div class="message"><?php echo $message; ?></div>
	<?php
	}
	?>

	<label for="tags_id">What is this quote about?</label>
	<small>Please select the topic this quote is a great contribution to.</small>
	<?php
	if (count($tags) > 0) {
		$tags_id = explode(',', $quote->tags_id);
	?>

		<select name="tags_id[]" id="tags_id" required>
			<option>Select topics related to this quote</option>
			<?php
			foreach ($tags as $t) {
				$selected = (in_array($t['id'], $tags_id)) ? 'selected' : '';
			?>
				<option value="<?php echo $t['id']; ?>" <?php echo $selected ?>><?php echo html_entity_decode($t['name']); ?></option>
			<?php
			}
			?>
		</select>
	<?php
	} ?>

	<p>
		<label for="author_id">Author:</label>
		<!--
	<input class="awesomplete" list="author-list" name="author_id" id="author_id">
	<datalist id="author-list">
-->
		<select name="author_id" id="author_id" required>
			<optgroup label="Pick the author of your quote in this list">
				<?php

				if (count($authors) > 0) {
					foreach ($authors as $a) {
						$selected = ($quote['author_id'] == $a['id']) ? 'selected' : '';
						echo '<option value="' . $a['id'] . '" ' . $selected . '>' . $a['fullname'];
					}
				}
				?>
			</optgroup>
		</select>
		<small>Not in this list? <a href="/author/add">Create a new Author</a>.</small></p>
	<p>
		<label>Source: <small>(a url)</small></label>
		<input name="source" placeholder="Don't forget the http://" class="pure-input-2-3" type="url" value="<?php echo (isset($quote['source'])) ? $quote['source'] : '';  ?>"></p>
	<p>
		<label>Quote:</label><textarea name="quote" placeholder="Write here thy quote, my friend." rows="5" required class="pure-input-2-3"><?php echo (isset($quote['quote'])) ? $quote['quote'] : '';  ?></textarea></p>

	<?php if ($user['role'] === 'admin') {
	?>
		<label>Status:
			<select name="status">
				<option value="pending" <?php echo ($quote['status'] == 'pending') ? "selected" : '';  ?>>Pending</option>
				<option value="online" <?php echo ($quote['status'] == 'online') ? "selected" : '';  ?>>Online</option>
			</select>
		</label>


	<?php
	} ?>

	<input type="submit" class="pure-button pure-button-primary" value="Save">


</form>
<?php if ($body_class == 'quote-edit') {
?>
	<p>... or <a href="/of/<?php echo $quote['author_slug']; ?>/<?php echo $quote['slug']; ?>">just view this beautiful quote</a></p>
<?php
}
