FROM php:7.4-apache
WORKDIR /var/www/html
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git libcurl4-openssl-dev && \
    docker-php-ext-install curl && \
    rm -rf /var/www/htmls

# Install Composer
RUN curl  -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require jasig/phpcas

# RUN git clone -c advice.detachedHead=false \
#     --single-branch --branch 1.4.0 https://github.com/apereo/phpCAS.git .

COPY cas_public.crt /etc/cert.crt
# Make sure cert can be read
RUN chmod 744 /etc/cert.crt

COPY index.php login.php logout.php ./