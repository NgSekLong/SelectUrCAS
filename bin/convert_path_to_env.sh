#!/bin/bash 
# Absolute path to this script, e.g. /home/user/bin/foo.sh
SCRIPT=$(readlink -f "$0")
# Absolute path this script is in, thus /home/user/bin
SCRIPTPATH=$(dirname "$SCRIPT")
cd ${SCRIPTPATH}/../source

env_file=../.env
env_default_file=../.env.default

# Truncate env_file
: > $env_file
cp $env_default_file $env_file

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


    # Set Constant name
    constant=${constant//-/_}
    constant_path="$constant"_PATH
    constant_type="$constant"_TYPE

    # Write to .env
    echo $constant=$constant_name >> $env_file

    echo $constant_path=$path >> $env_file
    echo $constant_type=$type >> $env_file


    # Output for better copy and paste
    echo 
    echo "\${$constant_type:-.} => $type"
    echo "\${$constant_path:-.} => $path"
    echo "\${$constant} => $constant_name"

done

echo "########End of Avaliable variable###########"