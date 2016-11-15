FROM php:7.0-apache
RUN apt-get update; apt-get install -y --no-install-recommends git zip unzip libpq-dev; rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install -j$(nproc) iconv pdo pdo_mysql pdo_pgsql
RUN a2enmod rewrite
RUN sed -i -e "s/DocumentRoot.*$/DocumentRoot \/var\/www\/html\/public/g" /etc/apache2/sites-available/000-default.conf
