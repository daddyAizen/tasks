# Dockerfile
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    sqlite3 \
    git \
    nodejs \
    npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install Node modules and build assets
RUN npm install && npm run build

# Laravel-specific permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache




CMD composer run dev
