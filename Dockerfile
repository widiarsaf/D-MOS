FROM php:7.4-apache

WORKDIR /var/www/d-mos

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
    && apt-get install -y \
    cron \
    icu-devtools \
    jq \
    libfreetype6-dev libicu-dev libjpeg62-turbo-dev libpng-dev libpq-dev \
    libsasl2-dev libssl-dev libwebp-dev libxpm-dev libzip-dev \
    unzip \
    zlib1g-dev \
    && apt-get clean \
    && apt-get autoclean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && yes '' | pecl install redis \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install gd intl pdo_mysql pdo_pgsql zip \
    && docker-php-ext-enable opcache redis

COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts --no-dev

COPY docker/ /
RUN a2enmod rewrite headers \
    && a2ensite d-mos \
    && a2dissite 000-default \
    && chmod +x /usr/local/bin/docker-d-mos-entrypoint

COPY . /var/www/d-mos
RUN composer install --optimize-autoloader --no-dev

CMD ["docker-d-mos-entrypoint"]