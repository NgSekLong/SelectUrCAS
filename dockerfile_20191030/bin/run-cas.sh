#!/bin/bash
export JAVA_HOME=/opt/java-home
export PATH=$PATH:$JAVA_HOME/bin:.
# echo "Use of this image/container constitutes acceptence of the Oracle Binary Code License Agreement for Java SE."
cd /cas-overlay/

# Remove and Merge all the properties into cas.properties
rm -f ./etc/cas/config/cas.properties
cat ./etc/cas/config/*.properties > ./etc/cas/config/cas.properties

echo -e "Executing build from directory:" && pwd
exec java -Dcas.standalone.configurationDirectory=/cas-overlay/etc/cas/config -jar build/libs/cas.war