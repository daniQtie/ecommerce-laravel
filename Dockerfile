# ----------- Base image -----------
FROM php:8.2-cli

# ----------- Set working directory -----------
WORKDIR /var/www/html

# ----------- Install system dependencies -----------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath

# ----------- Copy project files -----------
COPY . .

# ----------- Install composer -----------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# ----------- Permissions -----------
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# ----------- Optimize Laravel -----------
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# ----------- Expose port -----------
EXPOSE 8080

# ----------- Start PHP built-in server -----------
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
