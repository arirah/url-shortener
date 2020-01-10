<?php

namespace Shortener\UrlShortener;

use Shortener\UrlShortener\ValueObjects\ShortenUrl;
use Shortener\UrlShortener\ValueObjects\Url;

interface UrlShortenerProviderInterface
{

    /**
     * @param Url $longUri
     * @return ShortenUrl
     */
    public function shorten(Url $longUri): ShortenUrl;
}
