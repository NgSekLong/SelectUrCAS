FROM adoptopenjdk/openjdk8:alpine
WORKDIR /javacasclient

RUN apk add --no-cache git maven
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch master \ 
    https://github.com/cas-projects/cas-sample-java-webapp.git .

COPY thekeystore /etc/cas/jetty/thekeystore

# This step is needed because the demo in this repository used self-sign cert
COPY cas_public.crt /etc/cas/jetty/cert.crt

RUN keytool -import -trustcacerts -keystore /opt/java/openjdk/jre/lib/security/cacerts  -storepass changeit -noprompt -alias cas -file /etc/cas/jetty/cert.crt

RUN mvn clean package

ENTRYPOINT ["mvn", "jetty:run-forked"]