<?php

namespace ArirahShortener\UrlShortener;

use ArirahShortener\UrlShortener\Exceptions\UrlShortenerProviderException;
use ArirahShortener\UrlShortener\ValueObjects\ShortenUrl;
use ArirahShortener\UrlShortener\ValueObjects\Url;

class TinyUrl implements UrlShortenerProviderInterface
{

    // TINY URL API URL
    private const TINY_URL = 'https://tinyurl.com/api-create.php?url=';


    /**
     * @param Url $longUri
     * @return ShortenUrl
     * @throws Exceptions\UrlShortenerValidationException
     * @throws UrlShortenerProviderException
     */
    public function shorten(Url $longUri): ShortenUrl
    {
        $file_url_content  = @file_get_contents(self::TINY_URL . $longUri);
        if (empty($file_url_content)) {
            throw new UrlShortenerProviderException("Not a valid repsonse from TinyURL.");
        }
        return new ShortenUrl($file_url_content);
    }
}
