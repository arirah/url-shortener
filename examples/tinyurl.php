<?php

use Shortener\UrlShortener\UrlShortener;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $shortener =  new UrlShortener(new Shortener\UrlShortener\TinyUrl());
    echo (string) $shortener->shorten('https://news.google.com/?hl=en-US&gl=US&ceid=US:en');
} catch (Exception $e) {
    echo $e->getMessage() ;
}
