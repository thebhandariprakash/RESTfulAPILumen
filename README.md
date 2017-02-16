# RESTfulAPILumen

Lumen is a “micro-framework” built on top of Laravel’s components created by Taylor Otwell who is also responsible for Laravel.

## Cloning Project

`git clone https://github.com/thebhandariprakash/RESTfulAPILumen.git`

## Update composer
`php artisan composer update`
Updates all dependency

## Create Database and .env file

Crate your database and  .env file in the root of the project and setup database connection. for reference check `.env.example` file in the root of the project.

## Run Migration

Once database is created now you can run the `php artisan migrate`  in the project directory from console. This will create the necessary table for the project

## Run the project

type `php -S localhost:8000 -t public` in console

## Run project in browser
Type `http://localhost:8000` in your web browser

## Test the project
You can test project using tools like Post Man. You can install post man chrome plugin into your browser. You can test project as below

1. http://localhost:8000/api/v1/post
2. http://localhost:8000/api/v1/post/2
 
 