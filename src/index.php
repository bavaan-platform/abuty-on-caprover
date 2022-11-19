<?php

require("/var/www/html/vendor/autoload.php");

$fw = \Base::instance();

$fw->config('.config.ini');

// Use hook to modify all pages titles that are not the home page.
Sugar\Event::instance()->on("end_of_dom", function($dom){
    $format = ( Base::instance()->get("PATH") != "/" ) ? '{{@page_title}} | Abuty!' : '{{@page_title}}';
    $dom->getElementsByTagName('title')->item(0)->nodeValue = $format;
    return $dom;
});

$fw->route("GET /", function(\Base $fw) {
    echo "Boilerplate project deployed. Make your changes!";
});

Abuty::instance()->run();

?>