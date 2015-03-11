#!/bin/bash
readarray -t  dirs < .platform-read-write-dirs

# Move files away.
# Loop through array(dirs)
mkdir -p "../init/"
for dir in "${dirs[@]}"
do
 mv  "$dir" "../init/$dir/"
 mkdir "$dir"
done
