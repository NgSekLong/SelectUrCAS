FROM adoptopenjdk/openjdk11:alpine-jre 
RUN apk --no-cache  add git
WORKDIR /cas-management
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch 6.0 https://github.com/apereo/cas-management-overlay .

RUN sh ./build.sh package
#ENTRYPOINT ["/cas-management/build.sh", "package"]

COPY cas_public.crt /etc/cas/cert.crt
COPY thekeystore /etc/cas/thekeystore

RUN keytool -import -trustcacerts -keystore /opt/java/openjdk/lib/security/cacerts \
     -storepass changeit -noprompt -alias cas -file /etc/cas/cert.crt

ENTRYPOINT ["sh", "./build.sh", "run"]
