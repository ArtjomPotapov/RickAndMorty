FROM nginx

ADD conf/vhost.conf /etc/nginx/conf.d/default.conf

RUN apt-get update && apt-get install -y \
    mc \
    nano

WORKDIR /var/www