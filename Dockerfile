FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Copy all files into the container
COPY . /var/www/html/

# Give necessary permissions
RUN chmod -R 755 /var/www/html

EXPOSE 80
