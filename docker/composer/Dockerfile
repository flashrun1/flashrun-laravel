FROM composer:latest

WORKDIR /var/www/flashrun

#COPY composer*.json /var/www/flashrun

#RUN composer install

ENTRYPOINT cd /var/www/flashrun && composer install --ignore-platform-req=ext-bcmath