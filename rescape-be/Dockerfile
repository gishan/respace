# Base image (Debian-based)
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
    git \
    curl \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    gd

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy composer files
COPY composer*.json ./

# Install project dependencies
RUN composer install --no-scripts --no-autoloader

# Copy project files
COPY . .

# Generate optimized autoload files
RUN composer dump-autoload --optimize

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
