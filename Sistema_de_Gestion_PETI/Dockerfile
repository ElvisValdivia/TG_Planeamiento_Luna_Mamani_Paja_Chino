# Usa la imagen de PHP con Apache
FROM php:8.0-apache

# Copia los archivos de tu aplicación al contenedor
COPY . /var/www/html

# Cambia la propiedad y permisos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
