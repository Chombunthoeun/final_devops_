FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql intl

RUN a2enmod rewrite

COPY . /var/www/html

# Laravel public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
/etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
/etc/apache2/apache2.conf \
/etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 80