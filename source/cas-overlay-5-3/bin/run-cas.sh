#!/bin/sh

#####
# Build build.gradle
#
cd cas
cp build.default.gradle build.gradle
echo "dependencies {"  >> build.gradle
find ../build-gradle-dependencies/ -type f -name 'build.gradle' \
    -exec sh -c 'for file in "{}" ; do cat "$file" >> build.gradle ; echo  >> build.gradle ;  done' \;
echo "}"  >> build.gradle
cd ..


# #####
# # Build CAS
# #
# ./build.sh package --parallel
# cp ./build/libs/cas.war cas.war

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
sh build.sh run