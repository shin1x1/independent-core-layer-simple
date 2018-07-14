install:
	docker-compose run composer install
	docker-compose run composer install -d cakephp --ignore-platform-reqs --no-scripts
	docker-compose run composer install -d laravel
	cp -a ./laravel/.env.example ./laravel/.env
.PHONY: install
	
test:
	docker-compose run php-fpm ./vendor/bin/phpunit
.PHONY: test

phpcs:
	docker-compose run php-fpm ./vendor/bin/phpcs --standard=/var/www/html/ruleset.xml
.PHONY: phpcs

phpcbf:
	docker-compose run php-fpm ./vendor/bin/phpcbf --standard=/var/www/html/ruleset.xml
.PHONY: phpcbf

clean:
	docker-compose down
.PHONY: clean

phpstan:
	docker-compose run phpstan analyze --level 7 core
.PHONY: phpstan
