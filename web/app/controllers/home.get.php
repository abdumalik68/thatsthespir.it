<?php

global $db, $metatags;

//header_remove('X-Frame-Options');
$f3->set('user', $f3->get('SESSION.user'));

// Get random quote
$quote = new Spirit();
$random = $quote->get('random_unique');

if (!in_array($random->id, $_SESSION['used_quotes'])) {
    $_SESSION['used_quotes'][] = $random->id;
}

// Tags
$tags = new DB\SQL\Mapper($db, 'tags');
$tags->load(array('id=?', $random->tags_id));

$author = new DB\SQL\Mapper($db, 'authors');
$author->load(array('id=?', $random->author_id));
$f3->set('author', $author);
$f3->set('quote', $random);
$f3->set('tags', $tags);

$f3->set('body_class', "home");
$f3->set('content', 'home.php');

$f3->set('SESSION.goto', WWWROOT . '/of' . $random->author_slug . '/' . $random->slug);
$f3->set('metatags', $metatags);
$view = new View;
echo $view->render('layout.php');
$f3->clear('SESSION.query');
