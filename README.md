# Drupal 7.0 Example with PHP extensions

In this example we show how to enable specific PHP extensions:
Look at the .platform.app.yaml file
```
# Enabled PHP extensions.
runtime:
    extensions:
        - pdo
        - mysql
        - mysqli
        - pdo_mysql
        - sqlite3
        - gd
        - curl
        - intl
        - mcrypt
        - zendopcache
        - apc
```
