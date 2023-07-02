FROM php:8.0-apache

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y git
RUN apt-get install -y git npm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
# RUN composer install
RUN composer require laravel/ui
RUN php artisan ui vue
RUN npm install
RUN npm run dev
RUN php artisan ui vue --auth
RUN npm install 
RUN npm run dev

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181