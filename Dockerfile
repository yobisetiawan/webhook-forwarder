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

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage


# Install PHP dependencies (dev for local, --no-dev for production)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Laravel optimize (uncomment for production)
# RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

