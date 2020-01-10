<?php

namespace Shortener\UrlShortener;

use Shortener\UrlShortener\Exceptions\UrlShortenerProviderException;
use Shortener\UrlShortener\ValueObjects\AccessToken;
use Shortener\UrlShortener\ValueObjects\ShortenUrl;
use Shortener\UrlShortener\ValueObjects\Url;
use function bitly_get;


class Bitly implements UrlShortenerProviderInterface
{

    private $access_token;

    const STATUS_OK  = 200;
    const UNKNOWN_ERROR  = 500;
    const RATE_LIMIT_EXCEEDED  = 403;
    const MISSING_ARG_LOGIN  = 400;
    const TEMPORARILY_UNAVAILABLE  = 505;

    public static $errorTexts = array(
        self::UNKNOWN_ERROR => 'Bitly API Unknown error.',
        self::RATE_LIMIT_EXCEEDED => 'Bitly Rate limit exceed.',
        self::MISSING_ARG_LOGIN => 'Bitly Missing login argument.',
        self::TEMPORARILY_UNAVAILABLE => 'Bitly temporarily unavailable.',
    );


    /**
     * Bitly constructor.
     * @param AccessToken $access_token
     */
    public function __construct(AccessToken $access_token)
    {
        $this->access_token = $access_token;
    }


    /**
     * @param Url $longUri
     * @return ShortenUrl
     * @throws Exceptions\UrlShortenerValidationException
     * @throws UrlShortenerProviderException
     */
    public function shorten(Url $longUri): ShortenUrl
    {
        $params                 = array();
        $params['access_token'] = (string)$this->access_token;
        $params['longUrl']      = $longUri->getUrl();
        // Bitly API call
        $results                = bitly_get('shorten', $params);

        if (empty($results)) {
            throw new UrlShortenerProviderException("Bitly API response failed.") ;
        }

        if (isset($results['status_code']) && $results['status_code'] == self::STATUS_OK) {
            return new ShortenUrl($results['data']['url']);
        }
         
        throw new UrlShortenerProviderException(self::$errorTexts[$results['status_code']]) ;
    }
}
