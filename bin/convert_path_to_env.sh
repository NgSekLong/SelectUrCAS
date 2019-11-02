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

if [ "$dir" == "." ]; then
    continue
fi

constant=$dir
constant=${constant//\.\//}
constant=${constant//\//_}

constant_name=${constant//_/-}
echo $constant_name
constant=$(echo $constant | tr a-z A-Z)
constant=${constant//-/_}
constant_path="$constant"_PATH

# Write to .env
echo $constant=$constant_name >> $env_file
echo $constant_path=./source/$dir >> $env_file

echo 
echo "\${$constant_path:-.} => ./source/$dir"
echo "\${$constant} => $constant_name"

done

echo "########End of Avaliable variable###########"