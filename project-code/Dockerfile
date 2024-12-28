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
    libzip-dev

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

# Copy composer files first
COPY composer.json composer.lock ./

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Install dependencies
RUN composer install --no-scripts --no-autoloader --no-interaction

# Copy the rest of the application
COPY . .

# Generate autoloader and run scripts
RUN composer dump-autoload --optimize \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 storage bootstrap/cache

# Command to start PHP-FPM
CMD ["php-fpm"]
