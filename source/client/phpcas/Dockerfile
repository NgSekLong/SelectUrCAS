FROM php:7.2-apache
WORKDIR /var/www/html
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install --no-cache -y git
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch 1.3.8 https://github.com/apereo/phpCAS.git .

COPY index.php login.php logout.php ./