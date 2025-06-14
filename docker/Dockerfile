FROM ghcr.io/garage-isep/herogu-back/herogu-php-base

USER root

<<<<<<< HEAD
# ✅ Installation des bibliothèques nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Configuration nginx
COPY ./docker/nginx.conf /etc/nginx/nginx.conf

# Copie du code de l'application
=======
COPY ./docker/nginx.conf /etc/nginx/nginx.conf

>>>>>>> e6cde81e3f282078489b1d1e5dc1b0a5a3472eca
COPY --chown=nginx:www-data --chmod=777 . /var/www/html

LABEL ORIGIN herogu.garageisep.com

EXPOSE 80
LABEL org.opencontainers.image.source https://github.com/debut123/serremagique1