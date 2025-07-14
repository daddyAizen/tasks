# Use PHP 8.2 with FPM
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip curl sqlite3 git nodejs npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install and build frontend
RUN npm install && npm run build

# Laravel permissions
RUN chmod -R 775 storage bootstrap/cache

# Move SQLite DB to mounted folder
RUN mkdir -p /var/data && cp database/database.sqlite /var/data/database.sqlite

# Cache config & routes
RUN php artisan config:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Expose Laravel port
EXPOSE 8000

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
