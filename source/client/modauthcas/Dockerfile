FROM php:7.2-apache

RUN cd /opt/workspace/mod_auth_cas
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git automake build-essential libtool aptitude && \
    aptitude install -y apache-dev
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch v1.2 https://github.com/apereo/mod_auth_cas.git .



# Build the plugin
RUN autoreconf -ivf && ./configure && make


# Copy in the cert
COPY cas-server-self-sign-cert.crt /etc/cert.crt



WORKDIR /var/www/html
COPY index.php login.php logout.php ./