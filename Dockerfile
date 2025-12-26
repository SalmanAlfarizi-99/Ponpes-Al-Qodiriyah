# ============================================
# Laravel Production Dockerfile for Railway
# Optimized for free-tier deployment (PHP 8.4)
# ============================================

FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite and headers
RUN a2enmod rewrite headers

# Set document root to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache configuration to use public directory
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable .htaccess overrides for Laravel routing
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    </Directory>' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies (no dev dependencies for production)
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copy application files
COPY . .

# Complete composer install with autoloader optimization
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Create necessary directories
RUN mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/framework/cache/data \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# Set correct permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# Create storage symlink
RUN php artisan storage:link 2>/dev/null || true

# Create startup script that handles Render's PORT variable
RUN echo '#!/bin/bash\n\
    set -e\n\
    \n\
    # Update Apache to listen on Render PORT\n\
    if [ ! -z "$PORT" ]; then\n\
    sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf\n\
    sed -i "s/:80/:$PORT/g" /etc/apache2/sites-available/000-default.conf\n\
    fi\n\
    \n\
    # Generate APP_KEY if not set\n\
    if [ -z "$APP_KEY" ]; then\n\
    php artisan key:generate --force\n\
    fi\n\
    \n\
    # Clear and cache config\n\
    php artisan config:clear\n\
    php artisan cache:clear\n\
    php artisan view:clear\n\
    \n\
    # Run migrations\n\
    php artisan migrate --force 2>/dev/null || echo "Migration skipped"\n\
    \n\
    # Start Apache\n\
    apache2-foreground\n\
    ' > /usr/local/bin/start.sh && chmod +x /usr/local/bin/start.sh

# Expose port
EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
