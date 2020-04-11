<?php
global $db, $metatags;

$action = $f3->get('PARAMS.action');
$id = $f3->get('PARAMS.id');

$quote = new DB\SQL\Mapper($db, 'all_quotes_full');
$quote->load(array('quote_id=?', $id));

if ($quote->dry()) {
    $f3->error(404);
    exit;
}
$slug = $quote->slug;
$author = $quote->author_slug;


$f3->reroute('@quote_action(@slug=' . $slug .  ',@author=' . $author . ')', true);
