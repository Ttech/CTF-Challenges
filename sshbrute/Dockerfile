FROM alpine:3.4
MAINTAINER Adrian B. Danieli "https://github.com/sickp"

RUN apk --update add htop openssh \
  && sed -i s/#PermitRootLogin.*/PermitRootLogin\ yes/ /etc/ssh/sshd_config \
  && echo "root:39820ej2009qe901" | chpasswd \
  && rm -rf /var/cache/apk/*
RUN adduser -D lorens && passwd -u lorens
RUN echo "lorens:482002je0f2je03j0" | chpasswd lorens
RUN mkdir /home/lorens/.ssh/
COPY key /home/lorens/.ssh/authorized_keys
COPY key /home/lorens/.ssh/authorized_keys2
COPY flag.txt /home/lorens/flag.txt
RUN chmod 600 /home/lorens/.ssh/authorized_keys \
  && chmod 600 /home/lorens/.ssh/authorized_keys2 \
  && chmod 700 /home/lorens/.ssh/
RUN chown -Rv lorens:lorens /home/lorens/
COPY entrypoint.sh /
EXPOSE 22
ENTRYPOINT ["/entrypoint.sh"]

