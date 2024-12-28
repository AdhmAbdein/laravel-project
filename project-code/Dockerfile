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

# Install and run Laravel
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer create-project laravel/laravel . --prefer-dist --no-scripts \
    && composer require laravel/framework

# Copy your application code
COPY app app/
COPY public public/
COPY resources resources/
COPY routes routes/
COPY tests tests/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 storage \
    && php artisan key:generate

# Command to start PHP-FPM
CMD ["php-fpm"]
