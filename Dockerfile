FROM php:8.2-fpm-alpine

WORKDIR /var/www

# Dependencias del sistema
RUN apk add --no-cache \
    nginx \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    libpq-dev

# Extensiones PHP
RUN docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql gd zip intl mbstring

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar código
COPY . .

# Instalar dependencias
RUN composer install --no-dev --prefer-dist --no-interaction

# Permisos
RUN chmod -R 777 /var/www/writable

# Config de Nginx
COPY deploy/nginx/default.conf /etc/nginx/http.d/default.conf

EXPOSE 80

# Script de arranque
COPY deploy/start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]