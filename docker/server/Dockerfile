FROM php:7.2.1-apache

## Enables all the required php and apache modules
RUN docker-php-ext-install pdo pdo_mysql mysqli gettext
RUN a2enmod rewrite headers ssl
