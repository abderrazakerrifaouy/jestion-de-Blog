FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

# install nodejs and npm
RUN apt-get update && apt-get install -y \
    nodejs \
    npm

RUN a2enmod rewrite


WORKDIR /var/www/html

COPY apache.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80