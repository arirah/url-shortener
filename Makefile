init:
	make composer-install
	make example
	make phpunit

composer-install:
	docker run -ti --rm -v ${PWD}:/app composer install

example:
	docker run --rm -v ${PWD}:/app -w /app php:cli php examples/bitly.php

phpunit:
	docker run --rm -v ${PWD}:/app -w /app php:cli php ./vendor/bin/phpunit tests/urlTest


