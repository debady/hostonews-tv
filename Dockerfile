# Utilise l'image officielle PHP avec Apache
FROM php:8.2-apache

# Installe les extensions nécessaires (ex: PostgreSQL)
RUN docker-php-ext-install pdo pdo_pgsql

# Copie tous les fichiers de ton projet dans le dossier web d’Apache
COPY . /var/www/html/

# Active mod_rewrite pour Apache si tu utilises des routes propres
RUN a2enmod rewrite

# Donne les bons droits
RUN chown -R www-data:www-data /var/www/html
