FROM adoptopenjdk/openjdk8:alpine-jre AS cas

RUN apk --no-cache add curl
RUN mkdir -p cas-overlay
COPY ./src cas-overlay/src/
COPY ./gradle/ cas-overlay/gradle/
COPY ./cas/ cas-overlay/cas/
COPY ./gradlew ./settings.gradle ./build.gradle ./gradle.properties ./build.sh /cas-overlay/

# Add a base build gradle
COPY ./build.gradle /cas-overlay/build.default.gradle

RUN mkdir -p ~/.gradle \
    && echo "org.gradle.daemon=false" >> ~/.gradle/gradle.properties \
    && echo "org.gradle.configureondemand=true" >> ~/.gradle/gradle.properties \
    && cd cas-overlay \
    && chmod 750 ./build.sh \
    && sh ./build.sh package --parallel;

LABEL "Organization"="Apereo"
LABEL "Description"="Apereo CAS"

RUN cd / \
    && mkdir -p /etc/cas/config \
    && mkdir -p /etc/cas/services \
    && mkdir -p /etc/cas/saml \
    && mkdir -p cas-overlay;

COPY bin/*.* cas-overlay/
COPY etc/cas/ /etc/cas/
COPY etc/cas/config/ /etc/cas/config/
COPY etc/cas/services/ /etc/cas/services/
COPY etc/cas/saml/ /etc/cas/saml/
EXPOSE 8080 8443

ENV PATH $PATH:$JAVA_HOME/bin:.

WORKDIR /cas-overlay

ENTRYPOINT "/cas-overlay/run-cas.sh"
