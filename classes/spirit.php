<?php

class Spirit {
	function get($what=null){
		global $f3, $db;
		if (!isset($_SESSION['used_quotes'])){
			$_SESSION['used_quotes']= array();
		}
		$selected_query_base = 'SELECT q.id, q.id as quote_id, q.quote, q.source, q.status, q.creation_date, a.id as author_id, a.fullname,a.slug,a.photo,a.total,a.gender, tags_id, (SELECT group_concat(name) from tags as t where t.id=q.tags_id) as tags ';
		
		if($_SESSION['logged_in']=='ok'){
			$selected_query_base .= ', (SELECT COUNT(*) FROM favourites as f WHERE user_email="'.$_SESSION['user']['email'].'" AND f.quote_id=q.id ) as user_likes_it ';
		}
		$selected_query_base .= ' , (SELECT COUNT(*) FROM favourites as f WHERE f.quote_id=q.id ) as total_likes FROM quotes as q LEFT JOIN authors as a on q.author_id=a.id';
		
/*
echo $selected_query_base;
exit;
*/

		switch($what){
		case 'add':
			break;

		case 'pending':
			return (object)$db->exec($selected_query_base.' WHERE q.status="pending"  ORDER BY q.id DESC');
			break;

		case 'latest':
			return (object)$db->exec($selected_query_base.' WHERE status="online"  ORDER BY q.id DESC LIMIT 20');
			break;
			
			
		case 'user_favourites':
			$favs = $db->exec('SELECT GROUP_CONCAT(quote_id SEPARATOR ", ") favs FROM favourites WHERE user_email= ? ', $_SESSION['user']['email'] );
			$favs = $favs[0]['favs'];
						
			return (object)$db->exec($selected_query_base.' LEFT JOIN favourites on favourites.quote_id=q.id WHERE status="online" AND q.id IN ('.$favs.') ORDER BY favourites.date_created DESC');

		break;

		case 'sitemap':
			return $db->exec("SELECT CONCAT('/quote/view/',id) as url FROM quotes WHERE status='online' UNION SELECT CONCAT('/of/',slug) as url FROM authors");
			break;

		case 'author_chart':
			return $db->exec('SELECT * FROM authors ORDER BY total DESC');

			break;

		case 'random':
			$quotes = $db->exec($selected_query_base.' WHERE status="online" ORDER BY  last_sent ASC, RAND() LIMIT 1');
			return (object) $quotes[0];

		case 'random_unique':

			$not_in = implode(', ', $_SESSION['used_quotes']);
			if(strlen($not_in)>0){
				$not_in = " AND q.id NOT IN ($not_in)";
			}
			$quotes = $db->exec($selected_query_base.' WHERE status="online" '.$not_in.'  ORDER BY RAND() LIMIT 1');
			return (object) $quotes[0];
			break;

		case 'random_unique_with_photo':
			$not_in = implode(', ', $_SESSION['used_quotes']);
			if(strlen($not_in)>0){
				$not_in = " AND q.id NOT IN ($not_in)";
			}
			$quotes = $db->exec($selected_query_base.' WHERE status="online" AND photo !="" '.$not_in.'  ORDER BY  last_sent ASC, RAND() LIMIT 1');
			//die($selected_query_base.' WHERE status="online" '.$not_in.'  ORDER BY RAND() LIMIT 1');
			return (object) $quotes[0];
			break;

		default:
			$quotes =  $db->exec($selected_query_base.' WHERE id=:id AND status="online"',  array(':id'=>$what));
			return (object) $quotes[0];
			break;

		}
	}


}