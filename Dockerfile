# Usa la imagen de PHP con Apache
FROM php:8.0-apache

# Copia los archivos de tu aplicación al contenedor
COPY . /var/www/html
