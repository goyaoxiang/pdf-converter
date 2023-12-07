# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy PHP files into the container
COPY . /src/var/www/html

# Install Java Runtime Environment (JRE)
RUN apt-get update && apt-get install -y default-jre

# Expose port 80 for Apache
EXPOSE 80
