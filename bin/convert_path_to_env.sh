#!/bin/bash 

###########################################
# Convert path to env
#
# Steps to use
# - This script is intended to be used by want to modified / add their own CAS components
# - if you just want to use it, probably safe to ignore this file :)
# 


# Absolute path to this script, e.g. /home/user/bin/foo.sh
SCRIPT=$(readlink -f "$0")
# Absolute path this script is in, thus /home/user/bin
SCRIPTPATH=$(dirname "$SCRIPT")
cd ${SCRIPTPATH}/../source

env_file=../.env
env_default_file=../.env.default
jsonp_file=../env.jsonp

# Truncate env_file
: > $env_file
cp $env_default_file $env_file

#Set active profile
spring_active_profile=standalone

echo "########Avaliable variable###########"
for dir in `find . -type d`
do
    # Don't root
    if [ "$dir" == "." ]; then
        continue
    fi

    # If directory don't have docker-compose.yml, don't make variable
    if [ ! -f "$dir/docker-compose.yml" ]; then
        continue
    fi

    constant=$dir
    constant=${constant//\.\//}
    constant=${constant//\//_}

    # Set Constant Value
    constant_name=${constant//_/-}
    constant=$(echo $constant | tr a-z A-Z)
    type=`echo $dir | sed 's/\.\/\(.*\)\/.*/\1/'`
    path="./source/${dir:2}"
    name=`basename "$dir"`


    # Set Constant name
    constant=${constant//-/_}
    constant_path="$constant"_PATH
    constant_type="$constant"_TYPE
    constant_name="$constant"_NAME

    # Write to .env
    echo $constant=$constant_name >> $env_file

    echo $constant_path=$path >> $env_file
    echo $constant_type=$type >> $env_file
    echo $constant_name=$name >> $env_file


    # Output for better copy and paste
    echo 
    echo "\${$constant_path:-.} => $path"
    echo "\${$constant_type:-.} => $type"
    echo "\${$constant_name:-.} => $name"
    echo "\${$constant} => $constant_name"

    # Set active profiles:
    spring_active_profile=$spring_active_profile,$constant_name
done
echo "\${SPRING_PROFILES_ACTIVE} => $spring_active_profile"
echo SPRING_PROFILES_ACTIVE=$spring_active_profile >> $env_file
echo "########End of Avaliable variable###########"

# Print env into jsonp
(echo "callback({"; cat $env_file | sed 's/\"/\\\"/g' | sed -n 's|\(.*\)=\(.*\)|"\1":"\2"|p' | grep -v '^$' | paste -s -d"," -; echo "})")> $jsonp_file