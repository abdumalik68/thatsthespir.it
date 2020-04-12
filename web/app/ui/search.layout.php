<section class="searchform">
	<form method="get">

		<div class="pure-g">
			<div class="pure-u-4-5">
				<label for="searchinput">
					<span class="hidden">Search:</span>
					<input id="searchinput" type="text" name="query" autofocus value="<?= $query ?>" required placeholder="Type your search here...">
				</label>
			</div>
			<div class="pure-u-1-5">
				<p><input type="submit" name="" value="search"> </p>
			</div>
		</div>
	</form>



</section>

<?php if ($results && !empty($results)) {
	$total = count((array) $results);
	$count = 1;

?>
	<section class="found-quotes">
		<h1 style="text-align:center"><?= $total ?> Search Results</h1>
		<ol class="latest-quotes-list">
			<?php
			foreach ($results as $result) {
			?>
				<li>

					<?php

					$result = (object) $result;

					if ('author' === $result->object_type) {
					?>
						<figure class="quote"><a title="All quotes by <?php echo ucfirst($result->fullname); ?>" href="/of/<?php echo $result->author_slug; ?>" rel="author">

								<div class="photo" data-author="<?php echo $result->fullname; ?>" <?php echo (!empty($result->photo)) ? 'style="background-image: url(' . $upload_folder . '/' . $result->photo . ');"' : 'data-photo="none"'; ?> <?php echo ($result->gender == 'f') ? 'class="woman"' : '' ?>>&nbsp;</div>
								<figcaption class="author">
									Meet <?php echo ($result->gender == 'f') ? 'Ms. ' : 'Mr. ' ?> <?php echo ucfirst($result->fullname); ?>
							</a></figcaption>
						</figure>
					<?php
					} else {
					?>
						<figure class="quote">
							<blockquote cite="/of/<?= $result->author_slug ?>">
								<span class="guillemets"></span>
								<span class="the-quote"><?php echo (isset($result->body)) ? html_entity_decode($result->body) : ''; ?></span>
								<span class="pilcrow">|</span>
							</blockquote>
							<figcaption>
								<div class="photo avatar-small" data-author="<?php echo $result->fullname; ?>" <?php echo (!empty($result->photo)) ? 'style="background-image: url(' . $upload_folder . '/' . $result->photo . ');"' : 'data-photo="none"'; ?> <?php echo ($result->gender == 'f') ? 'class="woman"' : '' ?>>&nbsp;</div>
								<address class="author">– <a title="All quotes by <?php echo ucfirst($result->fullname); ?>" href="/of/<?php echo $result->author_slug; ?>" rel="author"><?php echo ucfirst($result->fullname); ?></a></address>

							</figcaption>
						</figure>
					<?php
					}


					?>
				</li>
			<?php
			}
			?>
		</ol>
	</section>
<?php
}
