#!/bin/bash
readarray -t  dirs < .platform-read-write-dirs
#move files away.
# loop through array(dirs)
mkdir -p "../init/"
for dir in "${dirs[@]}"
do
 mv  "$dir" "../init/$dir/"
 mkdir "$dir"
done