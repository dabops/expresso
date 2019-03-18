# Pull an LTS Alpine linux (~5MB) environment with
# Php already install on it.
FROM php:7.2.8-fpm-alpine

# Add entrypoint for custom operation at execution
ADD entrypoint.sh /

# Install dependencies
RUN apk update \
    && apk add --no-cache --virtual openssl zip unzip git \
    && docker-php-ext-install pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create the folder "code" under /code/
RUN mkdir /code

# We add the current content of the directory to /code
ADD . /code

# We specify the newly created folder app that
# it's where our command should be executed
WORKDIR /code

# We install our dependencies
RUN composer install

# We expose to our docker environment (network) the port
# we are using within the application. (ie 80)
EXPOSE 80

# We specify how we start our application
ENTRYPOINT ["/bin/sh", "-c", "/entrypoint.sh"]
