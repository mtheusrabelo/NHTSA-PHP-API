# NHTSA PHP Api

## Usage

Copy `src/.env.example` to `src/.env`, run the install script and then the run script.

## Install

`$ cd src`

`$ php composer.phar install`

## Run

`$ php -S localhost:8888 -t src/public`

## Docker

Build
```
$ docker build . -t nhtsa-php-api:latest
```

Run

```
$ docker run -p 8888:8888 nhtsa-php-api
```

PS: You can also use the `Makefile` to run these commands.

## Author
Matheus Freire Rabelo