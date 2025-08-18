# Dockerfile for Laravel app
FROM php:8.3-fpm

# Ensure all packages are up-to-date to reduce vulnerabilities
RUN apt-get update && apt-get upgrade -y

# Install system dependencies
RUN apt-get update \
    && apt-get install -y \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip \
        libzip-dev \
        libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy application code
COPY . /var/www

# Install Node.js and npm for building assets
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install JS dependencies and build assets
RUN npm install && npm run build

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/database\
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache /var/www/database

# Install PHP dependencies (dev for local, --no-dev for production)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Laravel optimize (uncomment for production)
# RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

