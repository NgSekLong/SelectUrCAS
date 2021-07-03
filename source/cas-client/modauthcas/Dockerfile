FROM php:7.2-apache

WORKDIR /opt/workspace/mod_auth_cas
RUN cd /opt/workspace/mod_auth_cas
RUN apt-get update && \
    apt-get install -y git libapache2-mod-auth-cas
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch v1.2 https://github.com/apereo/mod_auth_cas.git .

RUN a2enmod auth_cas


# Copy in the cert
COPY cas_public.crt /etc/cert.crt
RUN chmod 744 /etc/cert.crt

WORKDIR /var/www/html
COPY index.php login.php logout.php ./