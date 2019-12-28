<?php

class TheSpirit
{
    function get($f3)
    {
        require '../build/index.html';
        //$f3->reroute('../build/index.html', true);
    }

    function get_api()
    {
        echo "Welcome to the Spirit! 's API";
    }
    function get_xml_sitemap($f3, $params)
    {
        /** Lists the available content urls in an XML sitemap for the Googlebot */
    }

    function get_cover_image($f3, $params)
    {
        /** Send an image to use as default opengraph image */
    }

    function get_rss_feed()
    {
        /** List available content as an RSS Feed, in time DESC order */
    }

    function get_random_quote_rss($f3, $params)
    {
        /** Get the least sent quote for the next "Morning Spirit!" newsletter */
    }
}
