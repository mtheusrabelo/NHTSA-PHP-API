FROM php:7-cli-alpine

ENV APP_DIR /app
ENV API_PORT 8888

WORKDIR ${APP_DIR}
ADD . ${APP_DIR}

RUN cd src && php composer.phar install

ENTRYPOINT [ "sh", "/app/entrypoint.sh" ]
