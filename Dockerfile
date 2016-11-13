FROM php:7.0-apache
RUN apt-get update; apt-get install -y --no-install-recommends git zip unzip; rm -rf /var/lib/apt/lists/*
RUN sed -i -e "s/DocumentRoot.*$/DocumentRoot \/var\/www\/html\/public/g" /etc/apache2/sites-available/000-default.conf
