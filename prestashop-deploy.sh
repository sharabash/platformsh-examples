#!/bin/bash
# Copy the files.
readarray -t  dirs < .platform-read-write-dirs
# loop through array(dirs)
for dir in "${dirs[@]}"
do
 cp -R "../init/$dir/*" "$dir/"|| true
done

# Update the main URL of the site.
# TODO verify we are getting the correct URLs
# TODO see what happens for multi-shops
# TODO do some error catching here
URL=`php5 -r 'function http($var) {return(substr($var,0,5)=="http:");};function main($var) {return($var["type"]=="upstream");}; echo(parse_url(key(array_flip( array_filter(array_keys(array_filter(json_decode(base64_decode($_ENV["PLATFORM_ROUTES"]), TRUE), "main")),"http"))), PHP_URL_HOST));'`
URL_SSL=`php5 -r 'function http($var) {return(substr($var,0,6)=="https:");};function main($var) {return($var["type"]=="upstream");}; echo(parse_url(key(array_flip( array_filter(array_keys(array_filter(json_decode(base64_decode($_ENV["PLATFORM_ROUTES"]), TRUE), "main")),"http"))), PHP_URL_HOST));'`

#TODO get this from relationships,possibly do this by overriding configuration at runtime instead of
#modifying db
DB_NAME='main'
DB_HOST='database.internal'
DB_PREFIX='ps_'
#TODO we need to get the db prefix from config

#TODO we probably want some error handling

mysql -h $DB_HOST -D $DB_NAME -e "UPDATE ${DB_PREFIX}shop_url SET domain='$URL',domain_SSL='$URL_SSL' WHERE main = 1 AND id_shop = 1;"
mysql -h $DB_HOST -D $DB_NAME -e "UPDATE ${DB_PREFIX}configuration SET value='$URL' WHERE name='PS_SHOP_DOMAIN';"
mysql -h $DB_HOST -D $DB_NAME -e "UPDATE ${DB_PREFIX}configuration SET value='$URL_SSL' WHERE name='PS_SHOP_DOMAIN_SSL';"
