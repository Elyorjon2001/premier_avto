# PHP bilan ishlaydigan Alpine Linux
FROM php:8.1-fpm-alpine

# Kerakli kutubxonalarni o‘rnatish
RUN docker-php-ext-install pdo pdo_mysql

# Composer yuklash
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Loyihani konteynerga nusxalash
WORKDIR /var/www
COPY . .

# Laravel uchun ruxsat berish
RUN chmod -R 777 storage bootstrap/cache

# Laravel servisini ishga tushirish
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
