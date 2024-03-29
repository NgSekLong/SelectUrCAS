FROM php:5.6-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libmcrypt-dev libcurl3-dev git \
        && docker-php-ext-install curl json


RUN a2enmod rewrite
RUN a2ensite default-ssl
RUN a2enmod ssl

# import self-signed cert into trusted
COPY cas_public.crt /usr/local/share/ca-certificates/
RUN update-ca-certificates

# Install Composer
RUN curl  -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Git clone
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch master \ 
    https://github.com/bshaffer/oauth2-demo-php.git .

# Add PHP OAuth Basic Client
RUN composer install

RUN chmod -R 777 data/

# Override with custom opcache settings
COPY additional-php.ini $PHP_INI_DIR/conf.d/

EXPOSE 443