<?php
global $db, $f3;


$format = $f3->get('PARAMS.format');

$quote = new Spirit();
$items = (array) $quote->get('latest');

$rss1 = array();
if (count($items) > 0) {
	foreach ($items as $i) {
		//print_r($i);

		$rss1[] = (object) [
			'title' => truncate($i['quote'], 250), 'description' => $i['quote'] . '<br>– ' . $i['fullname'], 'url' => WWWROOT . '/of/' . $i['author_slug'] . '/' . $i['slug'], 'category' => '', 'date' => date("r", strtotime($i['creation_date']))
		];
	}
}
if ($format !== 'json') {
	$rss = new RSS;
	$rss->title = "That's The Spirit!";
	$rss->url = WWWROOT . '/feed';
	$rss->description = $rss->title;
	$rss->date = $rss1[0]->date;
	$rss->items = $rss1;

	header('Content-Type: text/xml; charset=utf-8');

	echo $rss->generate();
} else {
	header('Content-Type: application/json');
	echo json_encode($rss1);
}
exit;
