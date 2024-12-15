# Base image
FROM node:18 AS nuxt-build

# Step 1: Build the Nuxt.js frontend
WORKDIR /app/frontend

COPY frontend/package*.json ./
RUN npm install

COPY frontend/ .
RUN npm run build

# Step 2: Set up Laravel backend
FROM php:8.2-fpm

WORKDIR /var/www

# Install PHP dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git curl && \
    docker-php-ext-install pdo_mysql gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy Laravel files
COPY backend/ .

# Install Laravel dependencies
RUN composer install

# Step 3: Copy built Nuxt.js files into Laravel's public directory
COPY --from=nuxt-build /app/frontend/.output/public ./public/frontend

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage

# Expose the PHP port
EXPOSE 9000

# Run Laravel's built-in server for testing
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]