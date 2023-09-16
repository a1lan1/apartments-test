install:
	composer install
	yarn install
	make dbs
	make start

start:
	yarn build
	php artisan serve

dbs:
	php artisan migrate:fresh --seed

test:
	php artisan test
