# independent-core-layer-simple

https://speakerdeck.com/shin1x1/independent-core-layer-pattern

## Usage

```
$ git clone this_repo
$ cd this_repo
$ make install

$ make test
docker-compose run --rm php-cli ./vendor/bin/phpunit
PHPUnit 7.2.6 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 20 ms, Memory: 4.00MB

OK (2 tests, 3 assertions)
```

## Directory structure

```
├── Makefile
├── cakephp2       # Service layer with CakePHP2
├── cakephp3       # Service layer with CakePHP3
├── composer.json
├── composer.lock 
├── core           # Core layer
├── docker
├── docker-compose.yml
├── laravel        # Service layer with Laravel
├── phpunit.xml
├── ruleset.xml
├── tests
└── vendor
```
