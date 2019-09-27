FROM gliderlabs/alpine:3.4
RUN apk update && apk upgrade
RUN apk add -v python screen
RUN mkdir /opt/
COPY launch.sh /opt/launch.sh
COPY mather.py /opt/mather.py
EXPOSE 7979
ENTRYPOINT ["sh", "/opt/launch.sh"]
