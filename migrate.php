<?php


/*
	
	CREATE TABLE `authors` (
`id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `fullname` (`fullname`,`slug`), ADD KEY `slug` (`slug`), ADD KEY `total` (`total`);


ALTER TABLE `design_quotes` ADD `author_id` INT NULL AFTER `author`, ADD INDEX (`author_id`) ;

ALTER TABLE `design_quotes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
	
	
*/
// Start FatFreeFramework
$f3 = require('lib/base.php');

if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');
// Load configuration
$f3->config('config.ini');
$f3->set('AUTOLOAD','classes/');

define ('SERVER','live');

switch (SERVER){

	case 'dev':
		define('WWWROOT', 'http://thatsthespirit.v2');
		define('DB_NAME', 'thatsthespirit');
		define('DB_USER', 'pixeline');
		define('DB_PASSWORD', '5270L');
		define('DB_HOST', 'localhost');
		$f3->set('DEBUG',3);
	break;

	default:
		define('WWWROOT', 'http://thatsthespir.it');
		define('DB_NAME', 'thatsthespirit');
		define('DB_USER', 'ttspirit');
		define('DB_PASSWORD', 'Q5p2HqJcjaDaLqep');
		define('DB_HOST', 'localhost');
		$f3->set('DEBUG',0);

	break;
}

	
$db=new DB\SQL(
    'mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME,
    DB_USER,
    DB_PASSWORD
);

$authors = $db->exec("SELECT DISTINCT author from quotes WHERE author  <> '' ORDER BY author ASC LIMIT 2000");
echo '<pre>';
$log = [];
$total_g=0;
foreach($authors as $a){
	$author_l = strtolower($a['author']);
	$a_quotes = $db->exec('SELECT count(id) as total from quotes WHERE LOWER(author)="'.$author_l.'"');
	
	$slug = slug($a['author']);
	
	$total_g += (int)$a_quotes[0]['total'];
	// INSERT INTO authors SET slug = slug(author), fullname=author, total= $total
//*
	//$author->reset();
	$author =new DB\SQL\Mapper($db,'authors');
	$author->slug = $slug;
	$author->fullname = $a['author'];
	$author->total = $a_quotes[0]['total'];
	$author->save();
	$author->id = $author->get('_id');
	
//*/

	// UPDATE design_quotes SET author_id = $author_id WHERE LOWER(author)=LOWER($author)
	if(is_array($a_quotes)){
		$db->exec('UPDATE quotes SET author_id='.$author->id.' WHERE LOWER(author)="'.$author_l.'"');
	}
	
	// FINISHED !
	
	$log[]=array('author'=>$author->fullname, 'slug'=>$author->slug, 'id'=> $author->id, 'total'=>$author->total);
	
}

echo "Migration terminée. trouvé $total_g quotes \n";
//echo $db->log();
print_r($log);
echo '</pre>';


function slug($string)
{
    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}