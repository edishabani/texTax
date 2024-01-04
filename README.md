# texTax
This is a tech based content posting platform, created with Laravel and Alpine.js

# Tech Stack 
PHP 8.1
MySQL
AlpineJS


To install and run the project:

Copy the environment file: Copy the .env.example file to a new file named .env in the same directory. This file contains environment-specific settings that are loaded into your application.

Install PHP dependencies: Run composer install in the textax directory to install the PHP dependencies specified in composer.json.

Generate an application key: Laravel requires an application key for encrypting data. You can generate it using the artisan command.

Install JavaScript dependencies: Run npm install in the textax directory to install the JavaScript dependencies specified in package.json.

Build your assets: If you're using a build system like Vite or Webpack, you'll need to build your assets. For example, if you're using Vite, you can use the vite build command.

Set up your database: Update the .env file with your database connection details. Then, run the migrations using the artisan command.

Run your tests: Ensure that everything is set up correctly by running your tests.

Start your application: You can start your application using the PHP built-in server or Laravel's artisan serve command.

Please replace the placeholders with your actual data. Also, make sure to have PHP, Composer, and Node.js installed in your environment.
