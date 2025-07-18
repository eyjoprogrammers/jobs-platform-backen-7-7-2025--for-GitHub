FROM php:8.2-apache

# تثبيت المتطلبات الأساسية
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo_mysql zip

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ ملفات المشروع إلى مجلد الويب
COPY . /var/www/html

# تعيين مجلد العمل
WORKDIR /var/www/html

# إعطاء صلاحيات للملفات
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# إعداد Apache للـ public folder
RUN a2enmod rewrite
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# تثبيت dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# نسخ ملف البيئة وتوليد APP_KEY
COPY .env.example .env
RUN php artisan key:generate

