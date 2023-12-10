# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy PHP files into the container
COPY . /var/www/html/src

# Configure document root in Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

    # Create a directory for the upload files
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads && \
    chmod 755 /var/www/html/uploads && \
    # Create a directory for the output files
    mkdir -p /var/www/html/outputs && \
    chown -R www-data:www-data /var/www/html/outputs&& \
    chmod 755 /var/www/html/outputs && \
    # Install Java Runtime Environment (JRE) and Java Development Kit (JDK)
    apt-get update && \
    apt-get install -y default-jre && \
    apt-get install -y default-jdk



