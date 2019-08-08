FROM alpine:latest

RUN apk add --update \
  apache2 \
  php-apache2

RUN echo "ServerName localhost" >> /etc/apache2/httpd.conf
RUN mkdir -p /run/apache2

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
EXPOSE 80

