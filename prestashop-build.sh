#!/bin/bash
readarray -t  dirs < .platform-read-write-dirs
#move files away.
# loop through array(dirs)
for dir in "${dirs[@]}"
do
 mv  "$dir" "$dir-init"
 mkdir "$dir"
done