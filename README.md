# independent-core-layer-simple

https://speakerdeck.com/shin1x1/independent-core-layer-pattern

## Usage

```
$ git clone this_repo
$ cd this_repo
$ make install

$ make test
docker-compose run php-fpm ./vendor/bin/phpunit
Starting independent-core-layer-simple_db-test_1 ... done
Starting independent-core-layer-simple_db_1      ... done
PHPUnit 7.2.6 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 207 ms, Memory: 4.00MB

OK (2 tests, 3 assertions)
```

## Directory structure

```
├── Makefile
├── cakephp        # Service layer with CakePHP
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
