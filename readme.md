# Lee Aaron's User Registry Listing Application

## About User Registry Listing

This is an application that was created to showcase my knowledge and skills of PHP, Laravel PHP Framework, Javascript, HTML, CSS, Testing and more, by creating a CRUD application for the management of users.

## What is required

This was created using PHP 7.3, but should support PHP 7.0 and up.

The front-end packages were installed using NPM, some of the base packages failed when running it on my environment, so I had to update some composer and npm packages.

The back-end PHP packages were installed using composer.

The NPM packages were installed using NPM version 8.7.0

The composer packages were installed using Composer version 1.10.26 (some packages seem to fail when installing using composer 2)

## How to install NPM packages

Running `npm install`, should install the packages successfully.

Once the installation is complete, to build the files into the public folder with webpack, you should run `npm run dev` on a dev environment or `npm run prod` for a production environment

if there is a failure try using NPM version 8.7.0

## How to install Composer packages

Running `composer install`, should install all the php packages required on the system.

If there is a failure, try using composer 1.10.26.

## Running the application

Once you have all your required packages installed

you need to create a file named `.env` and copy the contents of `.env.example` and update the settings in the `.env` to connect to your database.

you can run the application using laravel's built in server, but running `php artisan serve`, or setting up your own server such as IIS and pointing it to the public folder and making sure it has PHP as a handler mapping.

## Running tests

PHPUnit is installed with the laravel application, once all packages are installed, you can run the tests by running `php vender/phpunit/phpunit/phpunit tests` and your tests should start running.