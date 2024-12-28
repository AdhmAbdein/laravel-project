FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmariadb-dev \
    libonig-dev \
    libzip-dev \
    pkg-config

# Set environment variables for libzip
RUN export PKG_CONFIG_PATH=/usr/local/lib/pkgconfig \
    && export LIBZIP_CFLAGS=-I/usr/local/include \
    && export LIBZIP_LIBS="-L/usr/local/lib -lzip"

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        bcmath \
        mbstring \
        zip \
        gd

# Set the working directory
WORKDIR /var/www/html

# Copy the project code into the container
COPY ./project-code /var/www/html

# Install Composer for Laravel dependencies
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --working-dir=/var/www/html

# Command to start PHP-FPM
CMD ["php-fpm"]
