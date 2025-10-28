# зависимости
FROM composer:latest AS build
WORKDIR /app

COPY project/composer.json project/composer.lock ./

RUN composer install --no-progress --no-suggest --no-scripts

RUN composer dump-autoload --no-scripts

# php
FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    build-base \
    git \
    curl

RUN docker-php-ext-install pdo_pgsql

WORKDIR /var/www/

COPY --from=build /app/vendor ./vendor

RUN chmod -R 775 storage bootstrap/cache vendor && \
    chown -R www-data:www-data storage bootstrap/cache vendor

CMD ["php-fpm"]
