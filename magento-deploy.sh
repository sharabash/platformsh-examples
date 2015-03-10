#!/bin/bash
# Copy the files.
readarray -t  dirs < .platform-read-write-dirs
# loop through array(dirs)
for dir in "${dirs[@]}"
do
 cp -R "../init/$dir/*" "$dir"|| true
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
ENCRYPTION_KEY="change_me"
ADMIN_EMAIL="admin@example.com"
ADMIN_PASSWORD="123123"
ADMIN_FIRSTNAME="Store"
ADMIN_LASTNAME="Owner"
DEFAULT_CURRENCY="USD"

#TODO we need to get the db prefix from config
#TODO we need to get the admin email from somewhere..
php -f install.php -- --license_agreement_accepted yes \
--locale en_US --timezone "America/Los_Angeles" --default_currency $DEFAULT_CURRENCY \
--db_host $DB_HOST --db_name $DB_NAME --db_user web --db_pass  \
--db_prefix magento_ \
--url "$URL" --use_rewrites yes \
--use_secure yes --secure_base_url "$URL_SSL" --use_secure_admin yes \
--admin_lastname $ADMIN_LASTNAME --admin_firstname $ADMIN_FIRSTNAME --admin_email $ADMIN_EMAIL \
--admin_username admin --admin_password $ADMIN_PASSWORD \
--encryption_key $ENCRYPTION_KEY