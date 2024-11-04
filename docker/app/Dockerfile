FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js LTS
RUN curl -fsSL https://deb.nodesource.com/setup_23.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd soap \
    # Add intl extension
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Create non-root user
RUN useradd -G www-data -u 1000 -d /home/dev dev \
    && mkdir -p /home/dev/.composer \
    && chown -R dev:www-data /home/dev

WORKDIR /var/www/html

# Copy start script
COPY docker/scripts/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

COPY --chown=dev:www-data . /var/www/html

RUN chmod -R 775 storage bootstrap/cache

USER dev

EXPOSE 9000 5173

CMD ["/usr/local/bin/start.sh"]
