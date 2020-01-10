<?php

namespace ArirahShortener\UrlShortener;

use ArirahShortener\UrlShortener\Exceptions\UrlShortenerValidationException;
use ArirahShortener\UrlShortener\ValueObjects\ShortenUrl;
use ArirahShortener\UrlShortener\ValueObjects\Url;

class UrlShortener
{
    private $provider;

    public function __construct(UrlShortenerProviderInterface $provider = null)
    {
         $this->provider = ($provider) ? $provider : new TinyUrl();
    }


    /**
     * @param $longUri
     * @return ShortenUrl
     * @throws Exceptions\UrlShortenerProviderException
     * @throws UrlShortenerValidationException
     */
    public function shorten($longUri) : ShortenUrl
    {

            return $this->provider->shorten(new Url($longUri));
    }
}
