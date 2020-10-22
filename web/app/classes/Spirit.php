<?php

class Spirit
{
    public function get($what = null)
    {
        global $f3, $db;

        if (!isset($_SESSION['used_quotes'])) {
            $_SESSION['used_quotes'] = array();
        }

        $selected_query_base = 'SELECT q.id, q.id as quote_id, q.quote, q.source, q.status, q.slug, q.creation_date, a.id as author_id, a.fullname,a.slug as author_slug,a.photo,a.total,a.gender, tags_id, (SELECT group_concat(name) from tags as t where t.id=q.tags_id) as tags, (SELECT group_concat(fullname) FROM `favourites` LEFT JOIN users as u on u.email=favourites.user_email WHERE quote_id=q.id) as likers ';

        if ($_SESSION['logged_in'] == 'ok') {
            $selected_query_base .= ', (SELECT COUNT(*) FROM favourites as f WHERE user_email="' . $_SESSION['user']['email'] . '" AND f.quote_id=q.id ) as user_likes_it ';
        }
        $selected_query_base .= ' , (SELECT COUNT(*) FROM favourites as f WHERE f.quote_id=q.id ) as total_likes FROM quotes as q LEFT JOIN authors as a on q.author_id=a.id ';

        switch ($what) {
            case 'add':
                break;

            case 'pending':
                return (array) $db->exec($selected_query_base . ' WHERE q.status="pending"  ORDER BY q.id DESC');
                break;

            case 'latest':
                return (object) $db->exec($selected_query_base . ' WHERE status="online"  ORDER BY q.id DESC LIMIT 20');
                break;

            case 'popular':
                $selected_query_base = 'SELECT quote, (SELECT COUNT(*) FROM `favourites` WHERE quote_id=q.id GROUP BY quote_id) as total_likes, (SELECT group_concat(fullname) FROM `favourites` LEFT JOIN users as u on u.email=favourites.user_email WHERE quote_id=q.id) as likers ';
                if ($_SESSION['logged_in'] == 'ok') {
                    $selected_query_base .= ', (SELECT COUNT(*) FROM favourites as f WHERE user_email="' . $_SESSION['user']['email'] . '" AND f.quote_id=q.id ) as user_likes_it ';
                }

                $selected_query_base .= ', q.id, q.id as quote_id, q.quote, q.slug, q.source, q.status, q.creation_date, a.id as author_id, a.fullname,a.slug as author_slug,a.photo,a.total,a.gender, tags_id, (SELECT group_concat(name) from tags as t where t.id=q.tags_id) as tags FROM quotes as q LEFT JOIN authors as a on q.author_id=a.id ORDER BY `total_likes` DESC LIMIT 0,20';

                return (object) $db->exec($selected_query_base);
                break;

            case 'user_favourites':

                $favs = $db->exec('SELECT GROUP_CONCAT(DISTINCT quote_id SEPARATOR ", ") favs FROM favourites WHERE user_email= ? ', $_SESSION['user']['email']);
                $favs = $favs[0]['favs'];
                if (!empty($favs)) {
                    $sql = $selected_query_base . ' LEFT JOIN favourites on favourites.quote_id=q.id WHERE status="online" AND q.id IN (' . $favs . ') ORDER BY favourites.date_created DESC';
                    return (object) $db->exec($sql);
                } else {
                    return null;
                }

                break;

            case 'sitemap':
                return $db->exec("SELECT CONCAT('/of/',author_slug, '/',slug) as url FROM all_quotes_full WHERE status='online' UNION SELECT CONCAT('/of/',slug) as url FROM authors");
                break;

            case 'author_chart':
                return $db->exec('SELECT * FROM authors ORDER BY total DESC');

                break;

            case 'random':
                $quotes = $db->exec($selected_query_base . ' WHERE status="online" ORDER BY  last_sent ASC, RAND() LIMIT 1');
                return (object) $quotes[0];

            case 'random_unique':

                $not_in = implode(', ', $_SESSION['used_quotes']);
                if (strlen($not_in) > 0) {
                    $not_in = " AND q.id NOT IN ($not_in)";
                }
                $quotes = $db->exec($selected_query_base . ' WHERE status="online" ' . $not_in . '  ORDER BY RAND() LIMIT 1');
                return (object) $quotes[0];
                break;

            case 'random_unique_with_photo':
                $not_in = implode(', ', $_SESSION['used_quotes']);
                if (strlen($not_in) > 0) {
                    $not_in = " AND q.id NOT IN ($not_in)";
                }
                $quotes = $db->exec($selected_query_base . ' WHERE status="online" AND photo !="" ' . $not_in . '  ORDER BY  last_sent ASC, RAND() LIMIT 1');
                //die($selected_query_base.' WHERE status="online" '.$not_in.'  ORDER BY RAND() LIMIT 1');
                return (object) $quotes[0];
                break;

            default:
                $quotes = $db->exec($selected_query_base . ' WHERE id=:id AND status="online"', array(':id' => $what));
                return (object) $quotes[0];
                break;
        }
    }
}
