API_PORT=8888
APP_DIR=/app
PWD=$(shell pwd)

install:
	cd src && php composer.phar install

run:
	php -S 0.0.0.0:${API_PORT} -t src/public

build-docker:
	docker build . -t nhtsa-php-api:latest

run-docker:
	docker run -v ${PWD}:${APP_DIR} -p ${API_PORT}:${API_PORT} --name nhtsa-php-api nhtsa-php-api

stop-docker:
	docker stop nhtsa-php-api && docker rm nhtsa-php-api
