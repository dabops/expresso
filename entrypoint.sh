#!/bin/sh
set -e

php artisan migrate

php -S 0.0.0.0:80 -t public

exec 'php-fpm'
