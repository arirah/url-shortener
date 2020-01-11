# URL shortener

URL shortener package have ability to support  different URL shortener providers.

## Installation


Install composer dependencies with `docker run --rm -v $(pwd):/app composer install`

You can also run make command like `make init`

Run examples `docker run --rm -v $(pwd):/app -w /app php:cli php examples/bitly.php`

Docker phpunit tests command : `docker run --rm -v $(pwd):/app -w /app php:cli php ./vendor/bin/phpunit tests/urlTest`


Use the package manager composer (https://getcomposer.org/doc/04-schema.md) to install URL shortener.

```bash
composer require arirah-shortener/url-shortener
```



## Usage

##### Provider 
Currently we have two providers bitly and tinyurl more will be added soon.

##### TinyUrl
In your file use like this , you must have to set provider instance :
``` php
$shortener =  new UrlShortener(new \ArirahShortener\UrlShortener\TinyUrl());
```

##### Bitly
For bitly you need to set API access_token
``` php
$shortener =  new UrlShortener(new \ArirahShortener\UrlShortener\Bitly('f7bb93c3ae74d10db0de48e9e038f13000e07d05'));
```

Currently we have two provider bitly and tiny url. Default provider is tinyurl.
For bit.ly you have to set access token from bitly account https://bitly.com/a/oauth_apps
No access_token ? dont worry it automatically switch to tinyurl provider.


Example : 
```php 

#BitLy
try {
    $access_token = new ArirahShortener\UrlShortener\AccessToken('f7bb93c3ae74d10db0de48e9e038f13000e07d05');
    $shortener =  new UrlShortener(new ArirahShortener\UrlShortener\Bitly($access_token));
    echo (string) $shortener->shorten('https://news.google.com/?hl=en-US&gl=US&ceid=US:en');
} catch (Exception $e) {
    echo $e->getMessage() ;
}

# TinyURL
try {
    $shortener =  new UrlShortener();
    echo (string) $shortener->shorten('https://news.google.com/?hl=en-US&gl=US&ceid=US:en');
} catch (Exception $e) {
    echo $e->getMessage() ;
}

```


Return : 
http://bit.ly/39Q2JoZ
 


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.