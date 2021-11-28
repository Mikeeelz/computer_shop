FROM php:8.0-fpm-alpine AS site

RUN apk add --no-cache \
    bash \
    git \
    coreutils \
    gettext \
    $PHPIZE_DEPS \
    icu-dev \
    libxml2-dev \
    libpng-dev \
    freetype-dev \
    jpeg-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    make \
    curl \
    ttf-dejavu \
    fontconfig

RUN docker-php-ext-install mysqli \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install intl \
  && docker-php-ext-install soap \
  && docker-php-ext-install zip \
  && docker-php-ext-install exif \
  && docker-php-ext-install gd \
  && docker-php-ext-install opcache

RUN NUMPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
    && docker-php-ext-install -j${NUMPROC} gd

COPY php-fpm.ini $PHP_INI_DIR/conf.d/
COPY php-fpm.ini $PHP_INI_DIR/conf.d/cli/conf.d/

COPY php-fpm.pool.conf /usr/local/etc/php-fpm.d/

COPY xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini

RUN pecl install xdebug-3.0.4; \
    docker-php-ext-enable xdebug;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-source delete

WORKDIR /application

CMD ["php-fpm", "-F"]

EXPOSE 9001
