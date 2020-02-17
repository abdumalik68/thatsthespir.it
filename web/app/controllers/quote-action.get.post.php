<?php
global $db, $metatags;

$action = $f3->get('PARAMS.action');
$id = $f3->get('PARAMS.id');

// Admin-restricted areas
$restricted = array('edit', 'delete', 'validate', 'favourite');

if (in_array($action, $restricted) && $f3->get('SESSION.logged_in') != 'ok') {
    // User not logged in, redirect to login page.
    $f3->set('SESSION.goto', '@quote_action(@id=' . $id . ',@action=' . $action . ')');
    $f3->reroute('@login');
}
$f3->clear('SESSION.goto');

// Fetch the quote data
$quote = new DB\SQL\Mapper($db, 'quotes');
if ($id) {

    $quote->total_likes = 'SELECT COUNT(*) FROM favourites WHERE quotes.id=favourites.quote_id';
    $quote->likers = 'SELECT group_concat(fullname) FROM `favourites` LEFT JOIN users as u on u.email=favourites.user_email WHERE quote_id=quotes.id';

    if (LOGGED_IN) {
        $quote->user_likes_it = 'SELECT COUNT(*) FROM favourites WHERE favourites.quote_id=quotes.id AND user_email="' . $_SESSION['user']['email'] . '"';
    }
    $quote->load(array('id=?', $id));
}

if ($quote->dry()) {
    //  No quote found with that id, return 404
    $f3->error(404);
}

// Tags
$tags = new DB\SQL\Mapper($db, 'tags');
$tags->load(array('id=?', $quote->tags_id));

// Common to all actions
$f3->set('tags', $tags);
$f3->set('user', $f3->get('SESSION.user'));
$f3->set('body_class', "quote-$action");
$metatags['title'] = "$action quote $id";
$metatags['description'] = "$action quote $id:" . $quote->quote;

switch ($action) {

    case 'favourite':

        // save the quote

        $fav = new DB\SQL\Mapper($db, 'favourites');
        $fav->load(array('user_email = :username AND quote_id=:quote LIMIT 0,1', ':username' => $_SESSION['user']['email'], ':quote' => $quote->id));

        if (!$fav->dry()) {
            $fav->erase();
        } else {
            $fav->quote_id = $quote->id;
            $fav->user_email = $_SESSION['user']['email'];
            $fav->save();
        }

        // Redirect to favourited quote url
        $f3->reroute('@quote_action(action=view,id=' . $quote->id . ')');

        break;

    case 'validate':

        $quote->status = 'online';
        $quote->save();

        //!TODO: si on soumet une quote et qu'elle est acceptée, automatiquement la favoriser.
        $user = $db->exec("SELECT email FROM users WHERE id='" . $quote->submitted_by . "'");
        $db->exec('INSERT INTO favourites SET quote_id="' . $quote->id . '", user_email="' . $user[0]['email'] . '"');

        // Redirect to validated quote url
        $f3->reroute('@quote_action(action=view,id=' . $quote->id . ')');
        break;

    case 'edit':

        if ($_POST) {
            //overwrite with values just submitted
            $quote->copyFrom('POST');
            $quote->tags_id = implode(',', $f3->get('POST.tags_id'));
            $quote->save();
            $f3->set('SESSION.message', "Quote updated.");
        }

        $f3->set('quote', $quote);
        $tags = $db->exec('SELECT * FROM tags ORDER By name ASC');
        $f3->set('tags', $tags);
        $authors = $db->exec('SELECT DISTINCT id, fullname, slug, photo FROM authors ORDER BY slug ASC');
        $f3->set('authors', $authors);

        $quote->copyTo('POST');
        $f3->set('content', 'quote.edit.php');
        break;

    case 'delete':

        // lorsque suppression d'une quote, décrémenter le total de l'author
        $author = new DB\SQL\Mapper($db, 'authors');
        $author->load(array('id=?', $quote->author_id));
        if (!$author->dry()) {
            $author->total--;
            $author->save();
        }
        $quote->erase();
        $f3->reroute('@home');

        break;

    case 'view':

        $f3->set('quote', $quote);

        $author = new DB\SQL\Mapper($db, 'authors');
        $author->load(array('id=?', $quote->author_id));
        $filename = $_SERVER['DOCUMENT_ROOT'] . UPLOADS . '/' . $author->photo;

        if (!empty($author->photo) && is_file($filename)) {
            $metatags['image'] = WWWROOT . UPLOADS . '/' . $author->photo;
            $size = getimagesize($filename);
            $metatags['image:width'] = $size[0];
            $metatags['image:height'] = $size[1];
        }
        $metatags['title'] = $quote->quote;
        $metatags['description'] = $quote->quote . " – " . $author->fullname;

        $f3->set('author', $author);
        $f3->set('content', 'quote.view.php');
        break;

    default:

        $f3->error(404);
        break;
}

$metatags['url'] = WWWROOT . '/quote/' . $action . '/' . $id;

$view = new View;
$f3->set('metatags', $metatags);
echo $view->render('layout.php');
$f3->clear('SESSION.query');
