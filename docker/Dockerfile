FROM alpine:latest

RUN apk add --update \
  apache2 \
  php7-apache2 \
  php7-mysqli \
  php7-xdebug

COPY config /etc/
RUN mkdir -p /run/apache2

CMD ["httpd", "-D", "FOREGROUND"]
EXPOSE 80