# Usa la imagen oficial de PHP 8.0
FROM php:8.0-apache

# Instala las dependencias necesarias, incluyendo Git y mysql-client
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    curl \
    default-mysql-client

# Instala extensiones necesarias de PHP
RUN docker-php-ext-install pdo pdo_mysql

# INSTALL COMPOSER
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Copia el código de la aplicación al contenedor
COPY ../../ /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html/

# Ejecuta composer install durante la construcción del contenedor
RUN if [ -f composer.json ]; then composer install; fi

# Exponer el puerto 80
EXPOSE 80
