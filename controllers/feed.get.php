<?php
global $db;

header('Content-Type: text/xml; charset=utf-8');

$quote=new Spirit();
$items = $quote->get('latest');
$rss1 = array();
if(count($items)>0){
	foreach($items as $i){
		//print_r($i);

		$rss1[] = (object)[
		'title' => truncate($i['quote'], 250)
		, 'description' => $i['quote']. '<br>– '.$i['fullname']
		, 'url' => WWWROOT.'/quote/view/'.$i['quote_id']
		, 'category' => ''
		, 'date' => date("r", strtotime($i['creation_date']))
		];
	}

}

$rss = new RSS;
$rss->title = "That's The Spirit!";
$rss->url = WWWROOT.'/feed';
$rss->description = $rss->title;
$rss->date = $rss1[0]->date;
$rss->items = $rss1;
echo $rss->generate();
exit;