FROM php:7.2.8-fpm-alpine

ADD entrypoint.sh /

RUN apk update \
    && apk add --no-cache --virtual openssl zip unzip git \
    && docker-php-ext-install pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /code
ADD . /code
WORKDIR /code

RUN composer install

EXPOSE 80

ENTRYPOINT ["/bin/sh", "-c", "/entrypoint.sh"]

