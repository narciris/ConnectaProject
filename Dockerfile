# Usar PHP + Apache
FROM php:8.4-apache

# Instalar dependencias de Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . /var/www/html

# Dar permisos
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

WORKDIR /var/www/html

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto (Render usa 1000 por defecto en Docker)
EXPOSE 1000

# Comando para correr Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=1000"]
