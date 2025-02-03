#!/bin/bash

set -e

if [ "${1#-}" != "$1" ]; then
    set -- php-fpm "$@"
fi

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

php artisan migrate
php artisan cache:clear
php artisan storage:link

exec "$@"