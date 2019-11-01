#!/bin/sh



./gradlew clean build --parallel;
cp ./build/libs/cas.war cas.war

exec java -server -noverify -Xmx2048M -jar cas.war