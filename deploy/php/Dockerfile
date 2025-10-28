FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    build-base \
    git \
    curl

RUN docker-php-ext-install pdo_pgsql

# Устанавливаем Composer для runtime
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN mkdir -p storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

CMD ["php-fpm"]