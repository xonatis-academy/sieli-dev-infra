FROM mysql:5.7

# Copier le script de configuration de la base de données
COPY config.sql /docker-entrypoint-initdb.d/

# Définir les variables d'environnement
ENV MYSQL_ROOT_PASSWORD=toor
ENV MYSQL_DATABASE=bookingapp
ENV MYSQL_USER=bookingappuser
ENV MYSQL_PASSWORD=bookingapppwd

# Exposer le port 3306 du container
EXPOSE 3306

# Définir le point d'entrée du container
CMD ["mysqld"]
