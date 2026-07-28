# 1. Usar una imagen oficial de PHP con Apache
FROM php:8.2-apache

# 2. Instalar dependencias del sistema y Node.js (necesario para Vite)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 3. Limpiar cache de apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 4. Instalar Composer oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Definir directorio de trabajo
WORKDIR /var/www/html

# 6. Copiar los archivos del proyecto al contenedor
COPY . .

# 7. Instalar dependencias de PHP y dependencias de Node, luego compilar Vite
RUN composer install --no-dev --optimize-autoloader \
    && npm install \
    && npm run build

# 8. Dar permisos correctos a las carpetas de almacenamiento y caché de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod 664 /var/www/html/database/database.sqlite

# 9. Configurar Apache para que apunte a la carpeta 'public' de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 10. Habilitar mod_rewrite de Apache para las rutas de Laravel
RUN a2enmod rewrite

# 11. Exponer el puerto por defecto
EXPOSE 80

# 12. Iniciar Apache adaptándolo al puerto dinámico que exige Render
CMD sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf && apache2-foreground