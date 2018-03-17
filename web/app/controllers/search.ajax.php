<?php
global $db, $metatags;
header_remove('X-Frame-Options');

$query = $f3->get('REQUEST.query');

$result = $db->exec("SELECT * FROM (SELECT LOWER(quote) as value, CONCAT('quotes:',id) as data FROM quotes UNION SELECT LOWER(fullname) as value, CONCAT('authors:',slug) as data FROM authors) AS U WHERE U.value like LOWER(:query)", array( ':query' => "%$query%") );
$f3->set('SESSION.query', $query);
$result = array("suggestions"=> $result );
echo json_encode($result);
exit;