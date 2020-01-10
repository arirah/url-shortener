<?php

namespace ArirahShortener\UrlShortener;

use ArirahShortener\UrlShortener\ValueObjects\ShortenUrl;
use ArirahShortener\UrlShortener\ValueObjects\Url;

interface UrlShortenerProviderInterface
{

    /**
     * @param Url $longUri
     * @return ShortenUrl
     */
    public function shorten(Url $longUri): ShortenUrl;
}
