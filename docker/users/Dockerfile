FROM php:7.1-apache

RUN apt-get update \
    && apt-get install -y \
    mc \
    wget \
    mysql-client \
    iputils-ping

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN pecl install xdebug-2.5.5 \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html
COPY composer.json composer.json
COPY composer.lock composer.lock
COPY bin bin
COPY config config
COPY public public
COPY src src
COPY symfony.lock symfony.lock

COPY docker/users/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/users/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN /var/www/html/bin/install-composer.sh

WORKDIR /var/www/html/public
VOLUME /var/www/html
CMD ["apache2-foreground"]
