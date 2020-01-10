<?php

namespace Shortener\UrlShortener;

use Shortener\UrlShortener\Exceptions\UrlShortenerValidationException;
use Shortener\UrlShortener\ValueObjects\ShortenUrl;
use Shortener\UrlShortener\ValueObjects\Url;

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
