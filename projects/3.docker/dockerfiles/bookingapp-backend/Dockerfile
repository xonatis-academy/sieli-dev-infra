FROM php:7.4-apache

# VOLUME /home/certif/bookingapp/volumes/backend:/var/www/html

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev \
  && docker-php-ext-install -j$(nproc) pdo_mysql mysqli \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd

# Activer l'extension mod_rewrite d'Apache
RUN a2enmod rewrite

# Exposer le port 80 du container
EXPOSE 80

# Définir le point d'entrée du container
CMD ["apache2-foreground"]
