FROM php:8.1-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_mysql intl

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls --install-dir=/usr/local/bin --filename=composer

RUN apt update && apt install -yqq nodejs npm

COPY . /var/www/

COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

RUN cd /var/www && \
    composer install --no-plugins --no-scripts --no-interaction && \
    npm install --force && \
    npm run build

RUN chmod -R 777 /var/www/var/cache

RUN chmod -R 777 /var/www/var/log

WORKDIR /var/www/

#ENTRYPOINT ["bash", "./docker/docker.sh"]

EXPOSE 80