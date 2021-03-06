# ![Article Management App](logo.png)

> ### Option to manage the Articles


----------

# Getting started

## Installation

Please check the official laravel 5.5 installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.5/installation#installation)


Clone the repository

    git clone https://github.com/princelonappan/mindvalley-app.git

Switch to the repo folder

    cd mindvalley-app/

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the seed command for adding fake data

    php artisan db:seed

Install the node modules

    npm install

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

Admin login/Register URL

    http://localhost:8000/login
    http://localhost:8000/register

Admin Article/Category/Tag

    http://localhost:8000/admin/article
    http://localhost:8000/admin/category
    http://localhost:8000/admin/tag