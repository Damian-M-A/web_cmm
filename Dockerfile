FROM php:8.2-fpm-alpine

WORKDIR /var/www

# Instalar dependencias del sistema y extensiones PHP
RUN apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql gd zip intl mbstring

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar código
COPY . .

# Instalar dependencias de PHP (sin dev)
RUN composer install --no-dev --prefer-dist --no-interaction

# Permisos
RUN chmod -R 777 /var/www/writable

EXPOSE 9000
CMD ["php-fpm"]