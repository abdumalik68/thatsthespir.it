<?php
global $db;

header('Content-Type: text/xml; charset=UTF-8');

$quote=new Spirit();
$quotes = $quote->get('sitemap');

echo '<?xml version="1.0" encoding="UTF-8"?>';?><urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
foreach($quotes as $quote){
	$priority = '1';
	$changefreq = 'monthly';
	?><url>
		<loc><?php echo WWWROOT . $quote['url'] ?></loc>
		<changefreq><?php echo $changefreq ?></changefreq>
		<priority><?php echo $priority ?></priority>
	</url><?php
}
?></urlset>