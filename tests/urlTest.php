<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class urlTest extends TestCase
{

    public function testValidUrl()
    {
        $longUrl = "https://news.google.com/?hl=en-US&gl=US&ceid=US:en";
        $url = new ArirahShortener\UrlShortener\ValueObjects\Url($longUrl);

        $this->assertTrue($url->getUrl() === 'https://news.google.com/?hl=en-US&gl=US&ceid=US:en');
    }

    public function testToStringUrl()
    {
        $longUrl = "https://news.google.com/?hl=en-US&gl=US&ceid=US:en";
        $url = new ArirahShortener\UrlShortener\ValueObjects\Url($longUrl);

        $this->assertSame($url->__toString(),'https://news.google.com/?hl=en-US&gl=US&ceid=US:en');
    }

    public function testEqualsUrl()
    {
        $longUrl = "https://news.google.com/?hl=en-US&gl=US&ceid=US:en";

        $url1 = new ArirahShortener\UrlShortener\ValueObjects\Url($longUrl);
        $url2 = new ArirahShortener\UrlShortener\ValueObjects\Url($longUrl);


        $this->assertEquals($url1, $url2);
    }
}
