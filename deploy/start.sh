#!/bin/sh
chmod -R 777 /var/www/public/img
chmod -R 777 /var/www/public/files
chmod -R 777 /var/www/writable

chown -R www-data:www-data /var/www/public/img
chown -R www-data:www-data /var/www/public/files
chown -R www-data:www-data /var/www/writable
php-fpm -D
nginx -g "daemon off;"