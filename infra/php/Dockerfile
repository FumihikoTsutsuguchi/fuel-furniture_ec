FROM php:8.2-fpm-buster
EXPOSE 5173

# Node.jsのバージョンを指定
ENV NODE_VERSION 18

# Node.jsのインストール
RUN curl -fsSL https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev \
    libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd intl pdo_mysql zip bcmath && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /data
