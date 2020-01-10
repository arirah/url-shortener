<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Shortener\UrlShortener\UrlShortener;

final class tinyUrlTest extends TestCase
{

    public function testShorteningValidUrl()
    {
        $shortener =  new UrlShortener();
        $short_url = $shortener->shorten('https://news.google.com/?hl=en-US&gl=US&ceid=US:en');


        $this->assertEquals($short_url, 'https://tinyurl.com/y2f7ytuh');
    }
}
