# Resim olarak PHP 8.2-FPM resmini kullan
FROM php:8.2-fpm

# Çalışma dizinini ayarla
WORKDIR /var/www

# Sistem güncellemelerini yap ve gerekli paketleri kur
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Composer'ı yükle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP extensiyonlarını kur
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Laravel bağımlılıklarını kur
COPY . .

RUN composer install

# Node.js kullanarak frontend bağımlılıklarını yükle
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Frontend bağımlılıklarını yüklepolls
COPY package.json package-lock.json ./
RUN npm install

# Permission düzeltmeleri
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Başlangıç komutunu ayarla
CMD ["php-fpm"]

# Portları dış dünyaya aç
EXPOSE 9000
