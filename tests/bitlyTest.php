<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Shortener\UrlShortener\UrlShortener;

final class bitlyTest extends TestCase
{

    public function testShorteningValidUrl()
    {
        $access_token = new Shortener\UrlShortener\ValueObjects\AccessToken('f7bb93c3ae74d10db0de48e9e038f13000e07d05');
        $shortener =  new UrlShortener(new Shortener\UrlShortener\Bitly($access_token));
        $short_url = $shortener->shorten('https://news.google.com/?hl=en-US&gl=US&ceid=US:en');


        $this->assertEquals($short_url, 'http://bit.ly/2LdOQFt');
    }
}
