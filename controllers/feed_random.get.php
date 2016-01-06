<?php
global $db;



// Get random quote
if(!isset($_SESSION['used_quotes'])){
	$_SESSION['used_quotes'] = array();
}
$quote = new Spirit();
$item = $quote->get('random_unique_with_photo');
$rss1 = array();
if(is_object($item)){
	$permalink = WWWROOT.'/quote/view/' . $item->quote_id;
	$filename =$_SERVER['DOCUMENT_ROOT'].'/'.UPLOADS.$item->photo;
	$share_message = urlencode($item->quote. "\n– ". $item->fullname );
	$tweet_version = urlencode(truncate($item->fullname. ': '.$item->quote, 90));
	$photo='';
	if(!empty($item->photo) && is_file($filename)){
		$photo = '<div class="avatar" title="'.ucfirst($item->fullname). '" style="margin:1em auto;border-radius:50%;width:200px;height:200px;background-color:white;background-position: center center;background-repeat: no-repeat;background-size:cover;background-image: url('.WWWROOT.'/'.UPLOADS.$item->photo.'); background:url('.WWWROOT.'/'.UPLOADS.$item->photo.') center center / cover no-repeat ; -webkit-box-shadow: inset 0px 0px 45px 5px rgba(18,18,18,0.19);-moz-box-shadow: inset 0px 0px 45px 5px rgba(18,18,18,0.19);box-shadow: inset 0px 0px 45px 5px rgba(18,18,18,0.19);"></div>';
	}
	$description = '<div style="text-align:center">';
	$description .= '<blockquote cite="'.$permalink.'" style="font-family:georgia, serif;font-size:32px;line-height:1.4">' . html_entity_decode($item->quote).'</blockquote>';
	$description .= $photo.'<strong>'.ucfirst($item->fullname). '</strong>

			<p style="text-align:center;line-height:2">
			<a style="padding:10px;" href="//www.facebook.com/sharer/sharer.php?u='.$permalink.'"><img src="'.WWWROOT.'/ui/img/facebook.png"  width="8" height="13" alt="share this quote on Facebook"></a>
<a  style="padding:10px;" href="http://twitter.com/share?text='.$tweet_version .'&amp;url='. $permalink .'&amp;hashtags=design_quote"><img  width="15" height="14" src="'.WWWROOT.'/ui/img/twitter.png" alt="share this quote on Twitter"></a>
</p>
			</div>';

	$rss1[] = (object)[
	'title' => truncate($item->quote, 250)
	, 'description' => $description
	, 'url' => $permalink
	, 'category' => $item->tags
	, 'date' => date("r", strtotime("-2 hour"))
	];
}
header('Content-Type: text/xml; charset=utf-8');
$rss = new RSS;
$rss->title = "The Spirit! of the day";
$rss->url = WWWROOT.'/feed_random';
$rss->description = $rss->title;
//$rss->date = $rss1[0]->date;
$rss->date = date('D, d M Y H:i:s O', strtotime("-1 hour"));
$rss->items = $rss1;
echo $rss->generate();

// update database
$now = date('Y-m-d h:i:s');
$db->exec("UPDATE quotes SET last_sent='$now' WHERE id='".$item->quote_id."';");

exit;