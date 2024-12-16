# Build stage
FROM composer:2 as vendor

WORKDIR /app

COPY composer.* ./

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Main stage
FROM php:8.2-fpm-bullseye

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    git \
    curl \
    libicu-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
    pdo_pgsql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    gd \
    intl

# Copy composer from vendor stage
COPY --from=vendor /usr/bin/composer /usr/bin/composer

# Copy vendor directory from vendor stage
COPY --from=vendor /app/vendor/ ./vendor/

# Copy application code
COPY . .

# Set directory permissions
RUN mkdir -p /var/www/html/storage/framework/{sessions,views,cache} \
    && mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/vendor

# Generate the autoloader
RUN composer dump-autoload --optimize

# Expose port 8000 for php artisan serve
EXPOSE 8000

# Create storage link and start the application
CMD php artisan storage:link && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
