FROM php:7.3.4-fpm-alpine3.9

# Packages
RUN apk update && apk add --no-cache --virtual .persistent-deps \
    git \
    icu-libs \
    zlib \
    libzip \
    freetype \
    libpng \
    libjpeg-turbo \
    openssl \
    rabbitmq-c \
    libpq

# Extensions
RUN set -xe \
    && apk add gnu-libiconv --update-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
        icu-dev \
        zlib-dev \
        libzip-dev \
        freetype-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        libxml2-dev \
        rabbitmq-c-dev \
        postgresql-dev \
    && docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-png-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install \
        intl \
        zip \
        gd \
        exif \
        bcmath \
        soap \
        pdo_mysql \
        iconv \
    && pecl install \
        apcu \
        xdebug \
    && docker-php-ext-enable apcu \
    && apk del .build-deps

ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

COPY php.ini /usr/local/etc/php/php.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini.disable

# Composer
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
    && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
    && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer \
    && rm /tmp/composer-setup.php && rm /tmp/composer-setup.sig

# Deptrac
RUN curl -LS http://get.sensiolabs.de/deptrac.phar -o deptrac.phar \
    && mv deptrac.phar /usr/local/bin/deptrac \
    && chmod +w,+x /usr/local/bin/deptrac

WORKDIR /app

ENTRYPOINT ["docker-php-entrypoint"]
CMD ["php-fpm"]
