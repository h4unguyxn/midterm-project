# Cài Node
FROM node:18 as node_modules
WORKDIR /app
COPY package*.json ./
RUN npm install && npm run build

# Laravel PHP base image
FROM php:8.2-fpm

# Cài PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy code + build assets từ layer node
COPY . .
COPY --from=node_modules /app/public/build ./public/build

# Laravel setup
RUN composer install --optimize-autoloader --no-dev \
 && php artisan config:clear \
 && php artisan route:clear \
 && php artisan storage:link \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
