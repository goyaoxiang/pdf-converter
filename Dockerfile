# Use an official PHP runtime as a parent image
FROM php:8.1.2-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy PHP files into the container
COPY . /var/www/html

# Install Java Runtime Environment (JRE)
RUN apt-get update && \
    apt-get install -y default-jre && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Expose port 80 for Apache
EXPOSE 80
