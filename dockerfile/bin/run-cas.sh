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

exec java -server -noverify -Xmx2048M -jar cas.war