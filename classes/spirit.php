<?php

class Spirit {
	function get($what=null){
		global $f3, $db;
		switch($what){
		case 'add':
			break;

		case 'pending':
			return $db->exec('SELECT *, quotes.id as quote_id FROM quotes LEFT JOIN authors on quotes.author_id=authors.id WHERE quotes.status="pending"  ORDER BY quotes.id DESC');

			break;

		case 'latest':
			return $db->exec('SELECT * FROM quotes WHERE status="online"  ORDER BY id DESC LIMIT 20');
			break;
			
		case 'author_chart':
			return $db->exec('SELECT * FROM authors ORDER BY total DESC');
		
			break;

		case 'random':
			$quotes = $db->exec('SELECT * FROM quotes WHERE status="online"  ORDER BY RAND() LIMIT 1');
			return $quotes[0];

			break;
		default:
			$quotes =  $db->exec('SELECT * FROM quotes WHERE id=:id AND status="online"',  array(':id'=>$what));
			return $quotes[0];
			break;

		}
	}
}