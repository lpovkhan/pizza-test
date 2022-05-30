FROM php:8.1-fpm
USER root

# Copy composer.lock and composer.json
COPY ./backend/composer.lock ./backend/composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    locales \
    zip \
    vim \
    unzip \
    git \
    curl

# Install extensions
RUN docker-php-ext-install pdo_mysql exif

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY --chown=www-data:www-data backend /var/www
RUN chmod -R 777 /var/www/storage/logs

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]