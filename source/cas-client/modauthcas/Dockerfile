FROM php:7.2-apache

WORKDIR /opt/workspace/mod_auth_cas
RUN cd /opt/workspace/mod_auth_cas
# RUN apt-get update && \
#     apt-get upgrade -y && \
#     apt-get install -y git automake build-essential libtool aptitude && \
#     aptitude install -y apache-dev
# RUN apt-get update && \
#     apt-get upgrade -y && \
#     apt-get install -y binutils make csh g++ sed gawk autoconf automake \ 
#     autotools-dev build-essential libtool apache2-dev \
#     libssl-dev libcurl4-openssl-dev libpcre3-dev
RUN apt-get update && \
    apt-get install -y git libapache2-mod-auth-cas
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch v1.2 https://github.com/apereo/mod_auth_cas.git .

RUN a2enmod auth_cas

# Build the plugin
# RUN autoreconf -ivf && ./configure && make

# RUN mkdir /var/cache/apache2/mod_auth_cas
# RUN chown www-data.www-data /var/cache/apache2/mod_auth_cas
# RUN chmod 700 /var/cache/apache2/mod_auth_cas

# Copy in the cert
COPY cas_public.crt /etc/cert.crt



WORKDIR /var/www/html
COPY index.php login.php logout.php ./