#!/bin/bash
readarray -t  dirs < .platform-read-write-dirs

# Loop through array(dirs).
for dir in "${dirs[@]}"
do
 #  Temporarly rename folders.
 mv  "$dir" "$dir-init"
 #  Recreate those folders that will be mounted by Platform.sh.
 mkdir "$dir"
done
