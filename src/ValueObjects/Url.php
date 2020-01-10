<?php
namespace Shortener\UrlShortener\ValueObjects;
use Shortener\UrlShortener\Exceptions\UrlShortenerValidationException;

class Url
{

    private $url;


    /**
     * Url constructor.
     * @param string $url
     * @throws UrlShortenerValidationException
     */
    public function __construct(string $url)
    {
        $this->url = $this->setUrl($url);
    }


    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->url;
    }


    /**
     * @param string $url
     * @return string
     * @throws UrlShortenerValidationException
     */
    private function setUrl(string $url): string
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new UrlShortenerValidationException("Not a valid URL");
        }
        return $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * @param Url $url
     * @return bool
     */
    public function equals(Url $url):bool
    {
        return $url === $this;
    }
}
