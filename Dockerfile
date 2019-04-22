FROM php:7.2-apache
COPY ./kitchen /var/www/html/kitchen
COPY ./cashier /var/www/html/cashier
COPY ./php_lib /var/www/html/php_lib
EXPOSE 80
