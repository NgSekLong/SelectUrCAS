#!/bin/sh


# Build cas.properties
rm -f /etc/cas/config/cas.properties
find /etc/cas/config/properties -type f -name '*.properties' -exec cat {} + > /etc/cas/config/cas.properties

# Build cas.yml
rm -f /etc/cas/config/cas.yml
find /etc/cas/config/properties -type f -name '*.yml' -exec cat {} + > /etc/cas/config/cas.yml

# Reconstruct build.gradle
cp build.default.gradle build.gradle
echo "dependencies {"  >> build.gradle

find ./build-gradle-dependencies/ -type f -name '*.properties' -exec cat {} + >> build.gradle
#cat ./build-gradle-dependencies/*.gradle >> build.gradle
echo "}"  >> build.gradle


# Build CAS
./gradlew clean build --parallel;
cp ./build/libs/cas.war cas.war

# Attempt to trigger the first login, so subsequent login is faster
sleep 60 && curl -k https://127.0.0.1:8443/cas/login &

exec java -server -noverify -Xmx2048M -jar cas.war

