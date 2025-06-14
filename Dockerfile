# Utilise une image officielle PHP avec Apache
FROM php:8.2-apache

# Installe les bibliothèques nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copie tout ton projet dans le dossier web
COPY . /var/www/html/

# Expose le port 80 (port par défaut pour le web)
EXPOSE 80
