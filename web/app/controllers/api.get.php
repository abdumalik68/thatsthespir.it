<?php

global $db, $metatags;
//$f3->set('user', $f3->get('SESSION.user') );

$quote = new Spirit();
$random = $quote->get('random_unique');

$author = new DB\SQL\Mapper($db, 'authors');
$author->load(array('id=?', $random->author_id));

// Using SESSION, let's try not to show twice the same quote.

$_SESSION['used_quotes'][] = $random->id;
$photo = (!empty($author->photo)) ? WWWROOT . '/uploads/' . $author->photo : '';
$result = array('quote' => $random->quote, 'author' => $author->fullname, 'id' => $random->id, 'permalink' => WWWROOT . '/quote/view/' . $random->id, 'photo' => $photo, 'gender' => $author->gender, 'slug' => $author->slug, 'total_quotes' => $author->total);

header('Access-Control-Allow-Origin: *');
header('content-type: application/json; charset=utf-8');
echo json_encode($result);
exit;
