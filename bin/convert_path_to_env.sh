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

for dir in `find . -type d`
do

if [ "$dir" == "." ]; then
    continue
fi

constant=$dir
constant=${constant//\.\//}
constant=${constant//\//_}
constant=${constant//-/_}
constant=$(echo $constant | tr a-z A-Z)
echo $constant
# Write to .env
echo $constant=./source/$dir >> $env_file

#STR1="This is a string"
#echo ${STR1// /,}

echo $dir
echo $constant

done