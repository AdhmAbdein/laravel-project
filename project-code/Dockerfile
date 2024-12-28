FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libjpeg62-turbo-dev libfreetype6-dev libmariadb-dev lsb-release apt-transport-https ca-certificates curl

# Add the Ondřej Surý PHP repository for PHP 8.1
RUN curl -sS https://packages.sury.org/php/README.txt | bash - \
    && apt-get update

# Install PHP 8.1 and required extensions
RUN apt-get install -y \
    php8.1-cli \
    php8.1-pdo \
    php8.1-mysql \
    php8.1-zip \
    php8.1-curl \
    php8.1-bcmath \
    php8.1-mbstring

# Set the working directory
WORKDIR /var/www/html

# Copy the project code into the container
COPY ./project-code /var/www/html

# Install Composer for Laravel dependencies
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Command to start PHP-FPM
CMD ["php-fpm"]

#Install Dependencies
#Installs the PHP extensions for PDO (PHP Data Objects) and PDO MySQL.
# enable Laravel to connect to a MySQL database.

#Install Laravel Dependencies & composer
