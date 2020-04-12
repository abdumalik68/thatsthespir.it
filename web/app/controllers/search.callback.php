<?php
global $db, $metatags;

$metatags['title'] = 'Search The Spirit!';

header_remove('X-Frame-Options');
$query = $f3->get('REQUEST.query');
if (!empty($query)) {
    $results = $db->exec("
SELECT * FROM searchable WHERE LOWER(fullname) like concat('%',LOWER(:query),'%') OR value LIKE concat('%',LOWER(:query),'%') order by url ASC", array(':query' => "%$query%"));

    $f3->set('results', $results);
    $f3->set('query', $query);
    $metatags['title'] = 'Search result for: ' . $query;
}

$f3->set('body_class', "search");
$f3->set('content', 'search.layout.php');
$f3->set('metatags', $metatags);
$view = new View;
echo $view->render('layout-page.php');
