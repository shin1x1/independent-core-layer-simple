.PHONY: install
install:
	docker-compose run --rm php-cli composer install
	docker-compose run --rm php-cli composer install -d cakephp2
	docker-compose run --rm php-cli composer install -d cakephp3 --ignore-platform-reqs --no-scripts
	docker-compose run --rm php-cli composer install -d laravel
	docker-compose run --rm php-cli cp -a ./cakephp3/config/.env.default ./cakephp3/config/.env
	docker-compose run --rm php-cli cp -a ./laravel/.env.example ./laravel/.env
	docker-compose run --rm php-cli sh -c 'cd laravel; php artisan key:generate'
	docker-compose run --rm php-cli chmod -R a+w ./laravel/storage ./laravel/bootstrap/cache
	docker-compose run --rm php-cli chmod -R a+w ./cakephp2/app/tmp

.PHONY: test
test:
	docker-compose run --rm php-cli ./vendor/bin/phpunit

.PHONY: db_setup
db_setup:
	docker-compose up -d web
	docker exec -it web sh -c 'cd laravel; php artisan migrate; php artisan db:seed'
	docker-compose down

.PHONY: up
up:
	docker-compose up -d web

.PHONY: down
down:
	docker-compose down
