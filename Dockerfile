FROM php:7.4-apache
RUN apt-get update \
  && apt-get install -y --no-install-recommends git zlib1g-dev libzip-dev zip unzip
RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite


RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && { \
          echo "zend_extension=xdebug"; \
          echo "xdebug.mode=debug"; \
          echo "xdebug.start_with_request=yes"; \
          echo "xdebug.client_host=host.docker.internal"; \
          echo "xdebug.client_port=9000"; \
          echo "xdebug.idekey=vscode"; \
      } > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini;

EXPOSE 80