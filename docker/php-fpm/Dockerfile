# base stage for all over versions
FROM php:8.0-fpm-alpine3.13 AS base
WORKDIR "/app"

RUN apk add --update linux-headers
COPY --from=mlocati/php-extension-installer:1.2.28 /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions xdebug pdo_pgsql  #intl gd redis openssl

COPY --from=composer:2.1.3 /usr/bin/composer /usr/bin/composer
VOLUME composer-cache:/tmp/
COPY composer.json ./
RUN composer install  \
    --no-ansi \
    --no-autoloader \
    --no-interaction \
    --no-scripts
COPY . ./
RUN composer dump-autoload --optimize --classmap-authoritative
