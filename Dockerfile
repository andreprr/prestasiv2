FROM dunglas/frankenphp:1.4.2-php8.2-bookworm

# Install PHP extensions
RUN install-php-extensions \
    bcmath \
    ctype \
    curl \
    dom \
    exif \
    fileinfo \
    gd \
    gmp \
    iconv \
    intl \
    json \
    libxml \
    mbstring \
    opcache \
    pcntl \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    pgsql \
    simplexml \
    soap \
    sockets \
    tokenizer \
    xml \
    zip


# Set working directory
WORKDIR /app

# Copy application files
COPY . /app

# Run Laravel optimizations and cache commands
RUN php artisan storage:link && \
    php artisan optimize:clear && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan event:cache



# Set the entry point for Laravel Octane
ENTRYPOINT ["php", "artisan", "octane:start", "--server=frankenphp","--workers=2", "--host=0.0.0.0", "--port=8016"]
