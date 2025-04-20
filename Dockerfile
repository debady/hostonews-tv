FROM php:8.2-apache

# Installer les dépendances système nécessaires à PostgreSQL + extensions PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Activer mod_rewrite (si tu en as besoin pour les routes propres)
RUN a2enmod rewrite

# Copier les fichiers de ton projet dans le dossier web d’Apache
COPY . /var/www/html/

# Définir les bons droits
RUN chown -R www-data:www-data /var/www/html
