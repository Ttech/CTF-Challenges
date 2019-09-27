#!/bin/sh
/usr/bin/php-fpm
/usr/sbin/nginx
# now wait
while true; do
	if [ -f "/stop" ]; then
		exit 0
	else 
		sleep 5
	fi
done

