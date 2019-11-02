#!/bin/sh

#####
# Build cas.properties
#
rm -f /etc/cas/config/cas.properties
# Add merge properties with new line in between
find /etc/cas/config/properties -type f -name '*.properties' \
    -exec sh -c 'for file in "{}" ; do cat "$file" >> /etc/cas/config/cas.properties ; echo  >> /etc/cas/config/cas.properties ;  done' \;

#####
# Build cas.yml
#
rm -f /etc/cas/config/cas.yml
# Add merge yml with new line in between
find /etc/cas/config/properties -type f -name '*.yml' \
    -exec sh -c 'for file in "{}" ; do cat "$file" >> /etc/cas/config/cas.yml ; echo  >> /etc/cas/config/cas.yml ;  done' \;

#####
# Build build.gradle
#
cp build.default.gradle build.gradle
echo "dependencies {"  >> build.gradle
find ./build-gradle-dependencies/ -type f -name 'build.gradle' \
    -exec sh -c 'for file in "{}" ; do cat "$file" >> build.gradle ; echo  >> build.gradle ;  done' \;
echo "}"  >> build.gradle


#####
# Build CAS
#
./gradlew clean build --parallel;
cp ./build/libs/cas.war cas.war

#####
# Attempt to trigger the first login, so subsequent login is faster
#
for i in 20 30 40 50 60 70 80 90 100
do
sleep $i && curl -s -k 'https://127.0.0.1:8443/cas/login' > /dev/null &
done


#####
# Exec java
#
exec java -server -noverify -Xmx2048M -jar cas.war
