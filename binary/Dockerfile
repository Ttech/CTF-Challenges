# Maintainer
MAINTAINER noooby
# make thing from docker
FROM ubuntu:16.04
RUN apt-get update && apt-get -y dist-upgrade
RUN dpkg --add-architecture i386
RUN apt-get -y install libc6-i386 libc6-dev-i386
RUN apt-get install -y lib32z1 xinetd timelimit xinetd python-crypto git
RUN useradd -m ctf
#COPY target /opt/target
#COPY flag /root/flag
#COPY flag /flag
#RUN chmod 777 /flag && chmod -x /flag
CMD ["/usr/sbin/xinetd", "-dontfork"]
EXPOSE 5555

