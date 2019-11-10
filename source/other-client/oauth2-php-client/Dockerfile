FROM php:7.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libmcrypt-dev libcurl3-dev git \
        && docker-php-ext-install curl json


RUN a2enmod rewrite
RUN a2ensite default-ssl
RUN a2enmod ssl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add PHP OAuth Basic Client
RUN composer require league/oauth2-client