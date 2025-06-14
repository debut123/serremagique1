FROM ghcr.io/garage-isep/herogu-back/herogu-php-base

USER root

# ✅ Installation des bibliothèques nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Configuration nginx
COPY ./docker/nginx.conf /etc/nginx/nginx.conf

# Copie du code de l'application
COPY --chown=nginx:www-data --chmod=777 . /var/www/html

LABEL ORIGIN herogu.garageisep.com
LABEL org.opencontainers.image.source https://github.com/debut123/serremagique1

EXPOSE 80
