FROM php:8.2-fpm

WORKDIR /var/www/html/uikit

ENV PHP_MEMORY_LIMIT=1G
ENV PHP_UPLOAD_MAX_FILESIZE: 512M
ENV PHP_POST_MAX_SIZE: 512M
ENV PHP_IDE_CONFIG: 512M

RUN apt-get -y update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && apt-get clean

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer





