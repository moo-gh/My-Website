FROM php:8.3-cli-alpine

RUN apk add --no-cache oniguruma-dev linux-headers \
    && docker-php-ext-install mbstring pdo pdo_mysql sockets

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/mo-ghorbani.ir
COPY . .
RUN composer install --no-dev --optimize-autoloader
