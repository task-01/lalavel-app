FROM php:8.2.12-fpm

COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y zip unzip

RUN docker-php-ext-install pdo pdo_mysql
