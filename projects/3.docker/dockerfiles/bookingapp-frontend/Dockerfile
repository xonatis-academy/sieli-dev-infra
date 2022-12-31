FROM bitnami/minideb

# Monter le répertoire /home/certif/bookingapp/volumes/frontend de l'hôte 
# vers /var/www/html du container
# VOLUME /home/certif/bookingapp/volumes/frontend:/var/www/html

# Do that to have a2enmod otherwise, change the .conf yourself (optimal)
RUN apt-get update && apt-get install apache2 -y

# Activer l'extension mod_rewrite d'Apache
RUN a2enmod rewrite

# Exposer le port 80 du container
EXPOSE 80

# Définir le point d'entrée du container
CMD ["apachectl", "-D", "FOREGROUND"]
