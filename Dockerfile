FROM php:8.0.5
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring
WORKDIR /app
COPY . /app
RUN composer install
RUN composer require laravel/ui
RUN php artisan ui vue
RUN npm install
RUN npm run dev
RUN php artisan ui vue --auth
RUN npm install 
RUN npm run dev

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181