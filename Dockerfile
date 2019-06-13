FROM php:5.6

RUN mkdir /twilio
WORKDIR /twilio

COPY src/Twilio ./src/Twilio
COPY Services ./Services
COPY composer* ./

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer install --no-dev
