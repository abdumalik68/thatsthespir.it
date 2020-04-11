<?php
global $db;

$format = $f3->get('PARAMS.format');


$quote = new Spirit();
$random = $quote->get('random_unique');
$_SESSION['used_quotes'][] = $random->slug;

if ($format !== 'json') {
	header("Location: /of/" . $random->author_slug . '/' . $random->slug);
} else {
	header('Content-Type: application/json');
	$random->url = WWWROOT . '/of/' . $random->author_slug . '/' . $random->slug;
	if (!empty($random->photo)) {
		$random->photo = WWWROOT . '/uploads/' . $random->photo;
	}
	$random->quote = strip_tags($random->quotes);
	echo json_encode($random);
}
exit;
