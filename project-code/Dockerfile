FROM php:8.1-fpm

#Install Dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libjpeg62-turbo-dev libfreetype6-dev libmariadb-dev

RUN apt-get update && apt-get install -y \
    php8.1-cli \
    php8.1-pdo \
    php8.1-mysql \
    php8.1-zip \
    php8.1-curl

#Installs the PHP extensions for PDO (PHP Data Objects) and PDO MySQL.
# enable Laravel to connect to a MySQL database.

WORKDIR /var/www/html

COPY ./project-code  /var/www/html

#Install Laravel Dependencies & composer
RUN apt-get update && apt-get install -y \
    lsb-release apt-transport-https ca-certificates curl \
    && curl -fsSL https://packages.sury.org/php/README.txt | bash - \
    && apt-get update \
    && apt-get install -y \
    php8.1-cli \
    php8.1-pdo \
    php8.1-mysql \
    php8.1-zip \
    php8.1-curl \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

CMD ["php-fpm"]

