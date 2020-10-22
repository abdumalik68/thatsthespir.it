<?php
if (!is_logged_in() && $f3->get('SESSION.logged_in') != 'ok') {
    $f3->set('SESSION.goto', '@quote_add');
    $f3->reroute('@login');
}

global $db, $metatags;

$f3->set('user', $f3->get('SESSION.user'));
$f3->set('body_class', "quote-add");
$tags = $db->exec('SELECT * FROM tags ORDER By name ASC;');
$f3->set('tags', $tags);

$quote = new DB\SQL\Mapper($db, 'quotes');

if (!empty($_POST)) {
    $f3->set('POST.slug', create_slug($f3->get('POST.quote')));

    //overwrite with values just submitted
    $quote->copyFrom('POST');
    if (!isset($_POST['status'])) {
        $quote->status = 'pending';
    }
    if ('admin' === $_SESSION['user']['role']){
        $quote->status = 'online';

    }
    $quote->tags_id = implode(',', $f3->get('POST.tags_id'));
    $quote->submitted_by = $_SESSION['user']['id'];
    $f3->set('POST.slug', $f3->get('POST.quote'));

    $quote->save();

    // lorsque ajout d'une quote, incrémenter le total de l'author
    $author = new DB\SQL\Mapper($db, 'authors');
    $author->load(array('id=?', $quote->author_id));
    if (!$author->dry()) {
        $author->total++;
        $author->save();
    }
    $f3->set('SESSION.message', "Thanks! Quote added.");
    $f3->set('SESSION.author.id', $quote->author_id);

    // Email to admin
    $smtp = new SMTP($f3->SMTP_HOST, $f3->SMTP_PORT, $f3->SMTP_PROTOCOL, $f3->SMTP_USER, $f3->SMTP_PASSWORD);

    $smtp->set('From', '"pixeline" <alexandre@pixeline.be>');
    $smtp->set('To', '<aplennevaux@gmail.com>');
    $smtp->set('Subject', "That's The Spirit: New Quote submitted to your attention, master");
    $smtp->set('Errors-to', '<alexandre@pixeline.be>');

    $message = 'On ' . date('d.m.Y at H:i:s') . ', a new quote was submitted to your attention, kind master.' . "\n---\n";
    $message .= $quote->quote . ' by ' . $author->fullname;
    $message .= "\n---\nReview it here: " . WWWROOT . $f3->alias('pending_quotes') . "\nSee you,\n\nThe Spirit.";
    $sent = $smtp->send($message, true);


    // Quote saved, redirecting...
    $f3->reroute('@quote_action(action=view,author='.$author->slug.',slug=' . $quote->slug . ')');
    exit;
}

$authors = $db->exec('SELECT DISTINCT id, fullname, slug FROM authors ORDER BY slug ASC;');
$quote->author_id = $f3->get('SESSION.author.id');
$quote->status = ($f3->get('SESSION.logged_in') != 'ok') ? 'pending' : 'online';
$f3->set('quote', $quote);
$f3->set('authors', $authors);

$quote->copyTo('POST');
$f3->set('content', 'quote.edit.php');

$metatags['title'] = "Suggest a new inspirational quote";
$metatags['description'] = "Suggest a new inspirational quote on Design or creativity";
$metatags['url'] = WWWROOT . '/quote/add/';

$view = new View;
$f3->set('metatags', $metatags);
echo $view->render('layout-page.php');
$f3->clear('SESSION.message');
