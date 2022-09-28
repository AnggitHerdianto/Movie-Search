# php
FROM php:8.1-fpm-bullseye

# timezone
RUN echo "Asia/Jakarta" > /etc/timezone
RUN rm -f /etc/localtime
RUN dpkg-reconfigure -f noninteractive tzdata

# update repo
RUN apt-get update -y --fix-missing
RUN apt-get upgrade -y 

# install useful tools
RUN apt-get install -y \
    apt-utils \
    net-tools \
    autossh \
    wget \
    nano \
    vim \
    dialog \
    npm \
    git \
    curl \
    openssl \
    unzip \
    zip \
    apt-file \
	pv

# install important lib
RUN apt-get install -y \
    gnupg \
    gnupg2 \
    build-essential \
    libcurl3-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libmemcached-dev \
    libzip-dev \
    libgeoip-dev \
    libxml2-dev \
    libxslt-dev \
    libtidy-dev  \
    libaio1 \
    libsqlite3-dev \
    libsqlite3-0 \
    libicu-dev \
    sharutils \
    tnef

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install pecl extension
RUN yes | pecl install mcrypt
RUN pecl install redis --configureoptions '--enable-redis-igbinary="no" --enable-redis-lzf="no" --enable-redis-zstd="no"'
RUN pecl install memcached --configureoptions '--with-libmemcached-dir="no" --with-zlib-dir="no" with-system-fastlz="no" --enable-memcached-igbinary="no" --enable-memcached-msgpack="no" --enable-memcached-json="no" --enable-memcached-protocol="no" --enable-memcached-sasl="no" --enable-memcached-session="no"'
RUN pecl install apcu
RUN pecl install timezonedb

# enable pecl extension
RUN docker-php-ext-enable mcrypt redis memcached apcu timezonedb

# install php extension
RUN docker-php-ext-install -j$(nproc) \   
    calendar \
    iconv \
    bcmath \
    xml \
    pdo \
    pdo_mysql \
    pdo_sqlite \
    tidy \
    gettext \
    mysqli \
    simplexml \
    xsl \
    xmlwriter \
    zip \
    opcache \
    exif \
    curl \
    intl \
    gd

# install php extension : pgsql
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql pgsql 
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# config php extension : gd
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/

# install laravel CLI
RUN composer global require laravel/installer

# hide debian detail
ARG DEBIAN_FRONTEND=noninteractive
