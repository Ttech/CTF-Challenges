# Use Alpine Linux
FROM alpine:3.3

# Maintainer
MAINTAINER noooby

# Environments
ENV TIMEZONE            America/Los_Angeles
ENV PHP_MEMORY_LIMIT    256M
ENV MAX_UPLOAD          50M
ENV PHP_MAX_FILE_UPLOAD 20
ENV PHP_MAX_POST        10M

# Let's roll
RUN	apk update && \
	apk upgrade && \
	apk add zip sqlite gd nginx && \
	apk add --update tzdata && \
	cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && \
	echo "${TIMEZONE}" > /etc/timezone && \
	apk add --update \
		php-mcrypt \
		php-soap \
		php-openssl \
		php-json \
		php-pdo \
		php-zip \
		php-mysql \
		php-sqlite3 \
		php-gd \
		php-pdo_mysql \
		php-pdo_sqlite \
		php-xmlrpc \
		php-bz2 \
		php-ctype \
		php-fpm
RUN ln -s /etc/php /etc/php5    
RUN sed -i "s|;*daemonize\s*=\s*yes|daemonize = yes|g" /etc/php5/php-fpm.conf && \
	sed -i "s|;*listen\s*=\s*127.0.0.1:9000|listen = 9000|g" /etc/php5/php-fpm.conf && \
	sed -i "s|;*listen\s*=\s*/||g" /etc/php5/php-fpm.conf && \
	sed -i "s|;*date.timezone =.*|date.timezone = ${TIMEZONE}|i" /etc/php5/php.ini && \
	sed -i "s|;*memory_limit =.*|memory_limit = ${PHP_MEMORY_LIMIT}|i" /etc/php5/php.ini && \
	sed -i "s|;*upload_max_filesize =.*|upload_max_filesize = ${MAX_UPLOAD}|i" /etc/php5/php.ini && \
	sed -i "s|;*max_file_uploads =.*|max_file_uploads = ${PHP_MAX_FILE_UPLOAD}|i" /etc/php5/php.ini && \
	sed -i "s|;*post_max_size =.*|post_max_size = ${PHP_MAX_POST}|i" /etc/php5/php.ini && \
	sed -i "s|;*cgi.fix_pathinfo=.*|cgi.fix_pathinfo= 0|i" /etc/php5/php.ini && \
	sed -i "s|;*error_reporting =.*|error_reporting = E_ALL|i" /etc/php5/php.ini && \
	sed -i "s|;*display_errors =.*|display_errors = on|i" /etc/php5/php.ini

RUN mkdir /www

COPY nginx.conf /etc/nginx/nginx.conf
COPY launch.sh /launch.sh

COPY web/ /www/

# Expose ports
EXPOSE 80

# Entry point
ENTRYPOINT ["/launch.sh"]

