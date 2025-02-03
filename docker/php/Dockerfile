FROM php:8.2-fpm-alpine

ENV TZ=Europe/Riga

# Set working directory
WORKDIR /var/www

RUN apk add nano \
    mc

# Opcache \
RUN docker-php-ext-configure opcache && \
    docker-php-ext-install opcache

# PDO PosgreSQL
RUN apk add postgresql-dev && \
    docker-php-ext-install pdo_pgsql

# GD
RUN apk add zlib-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd

# Zip
RUN apk add libzip-dev && \
    docker-php-ext-configure zip && \
    docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project
COPY . /var/www

RUN chmod +x entrypoint-php.sh
# COPY docker/cron-php /etc/crontabs/root

# Set additional php options
RUN echo 'date.timezone = "Europe/Riga"' >> /usr/local/etc/php/conf.d/custom.ini
RUN echo 'post_max_size = 15M' >> /usr/local/etc/php/conf.d/custom.ini
RUN echo 'upload_max_filesize = 15M' >> /usr/local/etc/php/conf.d/custom.ini

#Set owner
USER www-data
COPY --chown=www-data:www-data ./ /var/wwww/storage

ENTRYPOINT ["sh", "docker/php/entrypoint-php.sh"]
CMD ["php-fpm"]