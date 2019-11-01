#!/bin/sh


# Build cas.properties
rm /etc/cas/config/cas.properties
cat /etc/cas/config/*.properties > /etc/cas/config/cas.properties

# Reconstruct build.gradle
cp build.default.gradle build.gradle
echo "dependencies {"  >> build.gradle
cat ./build-gradle-dependencies/*.gradle >> build.gradle
echo "}"  >> build.gradle



./gradlew clean build --parallel;
cp ./build/libs/cas.war cas.war

# Attempt to trigger the first login, so subsequent login is faster
sleep 60 && curl -k https://127.0.0.1:8443/cas/login &

exec java -server -noverify -Xmx2048M -jar cas.war

