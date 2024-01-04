# texTax - Tech Content Posting Platform
texTax is a tech-based content posting platform developed with Laravel and Alpine.js.

## Tech Stack
```bash
PHP 8.1
MySQL
AlpineJS
```


## Installation and Setup
Follow these steps to set up and run texTax on your local environment. Ensure that you have PHP, Composer, and Node.js installed.

### 1. Copy Environment File
Copy the .env.example file to a new file named .env in the same directory. This file contains environment-specific settings that are loaded into your application.
cp .env.example .env

### 2. Install PHP Dependencies
Run the following command in the texTax directory to install the PHP dependencies specified in composer.json.
composer install

### 3. Generate Application Key
Laravel requires an application key for encrypting data. Generate it using the artisan command.
php artisan key:generate

### 4. Install JavaScript Dependencies
Run the following command in the texTax directory to install the JavaScript dependencies specified in package.json.
npm install

### 5. Build Assets
If you're using a build system like Vite or Webpack, build your assets. For example, if you're using Vite, use the following command.
vite build

### 6. Set Up Database
Update the .env file with your database connection details. Then, run the migrations using the artisan command.
php artisan migrate

### 7. Run Tests
Ensure that everything is set up correctly by running your tests.
php artisan test

### 8. Start Application
You can start your application using the PHP built-in server or Laravel's artisan serve command.
php artisan serve

Visit http://localhost:port in your web browser to access texTax.

Note: Replace the placeholders in the .env file with your actual data. Make sure to have PHP, Composer, and Node.js installed in your environment.
