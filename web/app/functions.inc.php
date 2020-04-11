<?php

/*
 HELPER FUNCTIONS
*/

function display_error($errors, $input)
{
	if (($_REQUEST || $_FILES) && isset($errors[$input])) {
		$message = '<ul class="errors">';
		if (is_array($errors[$input])) {
			$message = implode('<li>', $errors[$input]);
		} else {
			$message .= '<li>' . $errors[$input];
		}
		return $message . '</li></ul>';
	}
}

function is_logged_in()
{
	return isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']);
}


function create_slug($str, $delimiter = '-')
{
	/**
	 * source: https://stackoverflow.com/questions/40641973/php-to-convert-string-to-slug
	 */
	$str = strip_tags(trim($str));
	$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
	// limit to max 150 chars
	$slug = substr($slug, 0, 150);
	return $slug;
}

function fixSlugs($f3)
{
	global $db;
	$quotes = new DB\SQL\Mapper($db, 'quotes');
	$missing_slugs = $quotes->find('slug is NULL');
	if (empty($missing_slugs)) {
		die('All good: no empty slug.');
	}

	// Fix missing slugs by creating one and then saving it back in the db.
	$quote = new DB\SQL\Mapper($db, 'quotes');
	foreach ($missing_slugs  as $q) {
		$quote->load(
			array('id=?', $q->id)
		);
		$quote->slug = create_slug($q->quote);
		$quote->save();
		echo "<br>slug created: " . $quote->slug;
	}
	echo '<p>Done!';
}

/*
Create an excerpt
source: http://www.internoetics.com/2010/01/04/php-function-to-truncate-text-into-a-preview-or-excerpt-with-trailing-dots/
*/
function truncate($text, $numb = 200)
{
	if (strlen($text) > $numb) {
		$text = substr($text, 0, $numb);
		$text = substr($text, 0, strrpos($text, " "));
		$etc = " ...";
		$text = $text . $etc;
	}
	return $text;
}


function pr($arr, $exit = false)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';

	if ($exit) {
		exit;
	}
}
