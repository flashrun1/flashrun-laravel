FROM php:8.1.2-fpm
EXPOSE 9000
WORKDIR /var/www/flashrun

COPY conf.d/php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y git unzip libmcrypt-dev vim iputils-ping && docker-php-ext-install bcmath mysqli pdo_mysql
#    && docker-php-ext-install iconv mcrypt cli ctype curl dom fileinfo gd gettext hash intl json mbstring mysqli pdo pdo_mysql shmop mcrypt zip

# Install Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#ENV COMPOSER_ALLOW_SUPERUSER=1


#WORKDIR /var/www/flashrun
#RUN pwd
#RUN ls -la

#RUN php composer install
#RUN apt-get update && apt-get install node

#RUN composer update

