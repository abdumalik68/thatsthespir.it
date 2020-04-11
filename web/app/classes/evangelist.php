<?php

//error_reporting(E_WARNING | E_ERROR);

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;


class Evangelist
{
	function end(Base $f3)
	{
		$str =  "\n" . strftime('%x %X') . ": posting to $subreddit: Done";
		$f3->write($f3->TEMP . 'evangelist.txt', $str, TRUE);
	}
	function reddit(Base $f3)
	{
		$subreddit = "pixelinedevtest";

		$quote = new Spirit();
		$random = $quote->get('random_unique');
		$title = strip_tags($random->quote . " – " . $random->fullname);
		$link = WWWROOT . '/of/' . $random->author_slug . '/' . $random->slug;

		$reddit = new reddit();
		$response = $reddit->createStory($title, $link, $subreddit);
		$str =  "\n" . strftime('%x %X') . ": posting to $subreddit: " . json_encode($response);
		$f3->write($f3->TEMP . 'evangelist.txt', $str, TRUE);
	}


	function twitter(Base $f3)
	{

		/*
			Owner :	@thepopeofquotes

		*/
		define('CONSUMER_KEY', 'OtW4z9iOjRE333di73WVfW5De');
		define('CONSUMER_SECRET', 'xL0LkMTVlxq3PaUb39jWhG0JcZwsP1aIEptKYVXY881PYTTXqP');
		define('ACCESS_TOKEN', '4882847897-LtavZAHG2gRG5hw9KFzlIkHKPCg7G4kh5xVyrNz');
		define('ACCESS_TOKEN_SECRET', '1WCyRtmuqaoLUVnRY3ZmaT8LCHxcV3pIWUd1jfIBL5QNL');


		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
		$content = $connection->get("account/verify_credentials");

		$quote = new Spirit();
		$random = $quote->get('random_unique');
		$title = strip_tags($random->quote . " – " . $random->fullname);
		$link = WWWROOT . '/of/' . $random->author_slug . '/' . $random->slug;

		$tweetMessage = truncate($random->quote, 90) . ' ' . $link . ' #design_quote';


		// Check for 140 characters
		if (strlen($tweetMessage) <= 140) {
			// Post the status message
			$connection->post('statuses/update', array('status' => $tweetMessage));
		}
	}
}
