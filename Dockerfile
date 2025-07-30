FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev zip curl nginx \
    && docker-php-ext-install pdo_mysql zip mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache

COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

CMD service nginx start && php-fpm
