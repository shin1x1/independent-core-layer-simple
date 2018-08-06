FROM php:7.2-apache

RUN apt-get update \
  && apt-get install -y vim less git g++ libmcrypt-dev libicu-dev zlib1g-dev mysql-client \
  && docker-php-ext-install mbstring pdo pdo_mysql intl opcache zip \
  && pecl install mcrypt-1.0.1 xdebug \
  && docker-php-ext-enable mcrypt xdebug \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
  && curl -sSL https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && a2enmod rewrite \
  && usermod -u 1000 www-data

WORKDIR /var/www/html
