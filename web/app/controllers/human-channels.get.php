<?php

global $db, $metatags;
$f3->set('user', $f3->get('SESSION.user') );
header_remove('X-Frame-Options');

// all authors, cached for 5 minutes.
$authors = $db->exec('SELECT * FROM authors WHERE total > 0 ORDER BY total DESC, slug ASC' , NULL, 300);
$f3->set('all_authors', $authors);

$f3->set('body_class', "human-channels");
$f3->set('content', 'all-authors.php');
$f3->set('metatags', $metatags);
$view=new View;
echo $view->render('layout-page.php');
$f3->clear('SESSION.query');