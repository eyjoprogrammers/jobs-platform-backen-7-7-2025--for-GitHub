FROM php:8.2-apache

# تثبيت التبعيات
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تمكين mod_rewrite في Apache
RUN a2enmod rewrite

# نسخ ملفات المشروع إلى /var/www/html
COPY . /var/www/html

# إعداد مجلد العمل
WORKDIR /var/www/html

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# إعداد صلاحيات
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# إعادة ضبط DocumentRoot إلى /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# فتح المنفذ 80
EXPOSE 80
