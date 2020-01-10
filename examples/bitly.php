<?php

use ArirahShortener\UrlShortener\UrlShortener;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $access_token = new ArirahShortener\UrlShortener\ValueObjects\AccessToken('f7bb93c3ae74d10db0de48e9e038f13000e07d05');
    $shortener =  new UrlShortener(new ArirahShortener\UrlShortener\Bitly($access_token));
    echo (string) $shortener->shorten('https://news.google.com/?hl=en-US&gl=US&ceid=US:en');
} catch (Exception $e) {
    echo $e->getMessage() ;
}
