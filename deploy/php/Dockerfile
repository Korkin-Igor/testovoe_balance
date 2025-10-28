FROM php:8.2-fpm-alpine

# Системные зависимости
RUN apk add --no-cache \
    postgresql-dev \
    build-base \
    git \
    curl

# PHP-расширения
RUN docker-php-ext-install pdo_pgsql

# Composer для runtime (чтобы можно было запускать `composer install`)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Только vendor из build-стадии (на случай, если на хосте его нет)
COPY --from=build /app/vendor ./vendor

# Права (убедитесь, что папки существуют — иначе chown упадёт)
RUN mkdir -p storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache vendor && \
    chown -R www-data:www-data storage bootstrap/cache vendor

CMD ["php-fpm"]