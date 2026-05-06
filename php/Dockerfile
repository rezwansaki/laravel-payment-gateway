FROM php:8.4.8-fpm

LABEL maintainer="Riaz Uddin Masum"

ARG WWWGROUP
ARG MYSQL_CLIENT="mysql-client"

ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=0
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=0
ENV PHP_OPCACHE_REVALIDATE_FREQ=0

WORKDIR /var/www/html

ENV TZ=Asia/Dhaka
ARG UNAME=www-data
ARG UGROUP=www-data
ARG UID=1000
ARG GID=1001
RUN usermod  --uid $UID $UNAME
RUN groupmod --gid $GID $UGROUP
RUN mkdir -p /var/www/.config/psysh
RUN chmod -R 777 /var/www/.config

RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    libpq-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    zip \
    libxml2-dev \
    libzip-dev \
    libexif-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    default-mysql-client \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip xml mysqli pdo pdo_mysql opcache bcmath curl mbstring exif \
    && docker-php-ext-enable mysqli


# ✅ Install Node.js & npm (LTS version)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Optional: Check installed versions
RUN node -v && npm -v
RUN chown -R 1000:1000 "/var/www"

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
