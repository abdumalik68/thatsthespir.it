<?php

error_reporting(E_WARNING | E_ERROR);


class Evangelist {

	function reddit(Base $f3) {
		//global $db;
		/*
		$query = 'SELECT q.id, q.id as quote_id, q.quote, q.source, q.status, q.creation_date, a.id as author_id, a.fullname,a.slug,a.photo,a.total,a.gender, tags_id, (SELECT group_concat(name) from tags as t where t.id=q.tags_id) as tags , (SELECT COUNT(*) FROM favourites as f WHERE f.quote_id=q.id ) as total_likes FROM quotes as q LEFT JOIN authors as a on q.author_id=a.id WHERE q.status="online" ORDER BY RAND() LIMIT 1';

		$quote = $db->exec($query);

		$message = json_encode($quote[0]);
*/

		//require_once("reddit.php");

		//*
		$subreddit = "pixelinedevtest";

		$quote=new Spirit();
		$random = $quote->get('random_unique');
		$title = strip_tags($random->quote . " – ". $random->fullname);
		$link = WWWROOT.'quote/view'.$random->quote_id;
		
		$reddit = new reddit();
		$response = $reddit->createStory($title, $link, $subreddit);
		$str =  "\n".strftime('%x %X') . ": posting to $subreddit: ".json_encode($response);
		$f3->write($f3->TEMP.'evangelist.txt',$str,TRUE);
	}
}