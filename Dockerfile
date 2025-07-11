# استخدم صورة PHP مع Apache
FROM php:8.2-apache

# تثبيت PHP extensions المطلوبة للـ Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# نسخ ملفات المشروع
COPY . /var/www/html/

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# إعداد Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# إعداد Laravel
WORKDIR /var/www/html
RUN composer install \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

EXPOSE 80
