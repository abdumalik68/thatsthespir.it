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
			return $db->exec('SELECT *, quotes.id as quote_id FROM quotes LEFT JOIN authors on quotes.author_id=authors.id WHERE status="online"  ORDER BY quotes.id DESC LIMIT 20');
			
			break;

		case 'sitemap':
			return $db->exec("SELECT CONCAT('/quote/view/',id) as url FROM quotes WHERE status='online' UNION SELECT CONCAT('/of/',slug) as url FROM authors");
			break;

		case 'author_chart':
			return $db->exec('SELECT * FROM authors ORDER BY total DESC');
		
			break;

		case 'random':
			$quotes = $db->exec('SELECT * FROM quotes WHERE status="online"  ORDER BY RAND() LIMIT 1');
			return $quotes[0];
			
		case 'random_unique':
			$not_in = implode(', ', $_SESSION['used_quotes']);
			if(strlen($not_in)>0){
				$not_in = " AND id NOT IN ($not_in)";
			}
			$quotes = $db->exec('SELECT * FROM quotes WHERE status="online" '.$not_in.'  ORDER BY RAND() LIMIT 1');
			return $quotes[0];

			break;
		default:
			$quotes =  $db->exec('SELECT * FROM quotes WHERE id=:id AND status="online"',  array(':id'=>$what));
			return $quotes[0];
			break;

		}
	}
}