<?php
namespace ArirahShortener\UrlShortener\ValueObjects;
use ArirahShortener\UrlShortener\Exceptions\UrlShortenerValidationException;

class AccessToken
{

    private $access_token;

    /**
     * AccessToken constructor.
     * @param string $access_token
     */
    public function __construct(string $access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     * @return string
     * @throws UrlShortenerValidationException
     */
    public function setAccessToken(string $access_token): string
    {
        if (empty($access_token)) {
            throw new UrlShortenerValidationException("Access token not defined !");
        }
        return $access_token;
    }

    /**
     * @param AccessToken $accessToken
     * @return bool
     */
    public function equals(AccessToken $accessToken):bool
    {
        return $accessToken === $this ;
    }
}
