# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy PHP files into the container
COPY . /var/www/html

# Install Java Runtime Environment (JRE)
RUN apt-get update && \
    apt-get install -y default-jre && \
    apt-get install -y default-jdk

# temporary
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads && \
    chmod 755 /var/www/html/uploads

