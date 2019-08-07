FROM alpine:3.8

RUN apk add --update \
  nginx \
  php7-fpm \
  php7-pdo_mysql \
  tzdata

RUN cp /usr/share/zoneinfo/Europe/Berlin /etc/localtime

RUN apk add nginx \
  && mkdir -p /run/nginx

RUN apk add php7-fpm \
  && mkdir -p /run/php

COPY nginx.conf /etc/nginx/nginx.conf
COPY fpm.conf /etc/php7/php-fpm.d/www.conf

VOLUME /var/www

WORKDIR /var/www
CMD php-fpm7 && nginx -g "daemon off;"

EXPOSE 80