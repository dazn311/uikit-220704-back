FROM php:8.2-fpm

WORKDIR /var/www/html/uikit

ENV PHP_MEMORY_LIMIT=1G
ENV PHP_UPLOAD_MAX_FILESIZE: 512M
ENV PHP_POST_MAX_SIZE: 512M
ENV PHP_IDE_CONFIG: 512M

RUN apt-get -y update \
    && apt-get install -y libpq-dev \
    && apt-get clean

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer





