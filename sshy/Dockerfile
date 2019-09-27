
FROM alpine:3.4
MAINTAINER nboody

ENV DROPBEAR_CONF=/etc/dropbear \
    ALPINE_USER=challenge

RUN apk update && apk upgrade && apk add --update dropbear openssh sudo rsync bash python
RUN mkdir /usr/libexec \
    && ln -s /usr/lib/ssh/sftp-server /usr/libexec/ \
    && touch /var/log/lastlog \
    && mkdir -p /usr/local/bin/ \
    && echo "/usr/local/bin/nsh" >> /etc/shells

COPY docker-entrypoint.sh /docker-entrypoint.sh
COPY nsh /usr/local/bin/nsh
COPY motd /etc/motd
COPY flag1.txt /flag.txt
#COPY flag2.txt /etc/flag.txt

RUN chmod +x /docker-entrypoint.sh && adduser -s /usr/local/bin/nsh -D $ALPINE_USER && \
	mkdir -p /home/$ALPINE_USER/Documents && \
	mkdir -p /home/$ALPINE_USER/Downloads && \
	mkdir -p /home/$ALPINE_USER/Movies && \
	mkdir -p /home/$ALPINE_USER/Pictures && \
	mkdir -p mkdir -p /home/$ALPINE_USER/Public && \
	touch /home/$ALPINE_USER/NOTES.TXT && \
	touch /home/$ALPINE_USER/secrets
#COPY flag3.txt /home/$ALPINE_USER/flag.txt

EXPOSE 22

ENTRYPOINT ["/docker-entrypoint.sh"]

CMD []
