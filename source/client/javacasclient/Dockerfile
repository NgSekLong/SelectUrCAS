FROM adoptopenjdk/openjdk8:alpine
WORKDIR /javacasclient

RUN apk add --no-cache git maven
RUN git clone -c advice.detachedHead=false \
    --single-branch --branch master \ 
    https://github.com/cas-projects/cas-sample-java-webapp.git .

RUN mvn clean package

ENTRYPOINT ["mvn", "jetty:run-forked"]