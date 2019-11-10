#!/bin/bash 


# Absolute path to this script, e.g. /home/user/bin/foo.sh
SCRIPT=$(readlink -f "$0")
# Absolute path this script is in, thus /home/user/bin
SCRIPTPATH=$(dirname "$SCRIPT")
cd ${SCRIPTPATH}/../output


cp -R ../source source

parentdir="$(dirname `pwd`)"
sed -i "s@$parentdir@\.@g" docker-compose.yml

echo "Done"