# Utilise une image officielle PHP avec Apache
FROM php:8.2-apache

# Copie tout ton projet dans le dossier web de l’image
COPY . /var/www/html/

# Active les extensions PDO (si tu utilises une base MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Expose le port 80 (port par défaut pour le web)
EXPOSE 80
