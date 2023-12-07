# Stage 1: Node.js
FROM node:14 AS node

WORKDIR /usr/src/app

COPY package*.json ./

RUN npm install

COPY . .

# Stage 2: PHP
FROM php:7.4-fpm

WORKDIR /var/www

COPY --from=node /usr/src/app .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer*.json ./

RUN composer install

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring

EXPOSE 8080

CMD [ "php", "-S", "0.0.0.0:8080", "-t", "public" ]
