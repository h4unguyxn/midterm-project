FROM php:8.2-fpm

# Cài các gói cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Làm việc tại thư mục ứng dụng
WORKDIR /var/www

# Copy toàn bộ code vào container
COPY . .

# Cài đặt Laravel dependencies (chế độ production)
RUN composer install --optimize-autoloader --no-dev

# Tạo APP_KEY nếu chưa có (nếu bạn đã cấu hình APP_KEY bên ngoài thì không cần)
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear

# CHÚ Ý: tạo storage/link & cấp quyền
RUN php artisan storage:link && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache

# Mở cổng 8000
EXPOSE 8000

# Khởi chạy Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
