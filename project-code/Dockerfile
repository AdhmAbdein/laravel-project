FROM php:8.1-fpm

#Install Dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libjpeg62-turbo-dev libfreetype6-dev libmariadb-dev

RUN apt-get update && apt-get install -y \
    php8.1-pdo \
    php8.1-pdo-mysql
#Installs the PHP extensions for PDO (PHP Data Objects) and PDO MySQL.
# enable Laravel to connect to a MySQL database.

WORKDIR /var/www/html

COPY ./project-code  /var/www/html

#Install Laravel Dependencies & composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer install --no-dev 

CMD ["php-fpm"]

