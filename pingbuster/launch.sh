#!/bin/sh
#/usr/bin/php-fpm -R
#/usr/sbin/nginx
cd /www
php -S 0.0.0.0:80 
## now wait
#while true; do
#	if [ -f "/stop" ]; then
#		exit 0
#	else
#		sleep 5
#	fi
#done

