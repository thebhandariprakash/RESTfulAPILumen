# RESTfulAPILumen

Lumen is a “micro-framework” built on top of Laravel’s components created by Taylor Otwell who is also responsible for Laravel.

## Cloning Project

`git clone https://github.com/thebhandariprakash/RESTfulAPILumen.git`

## Update composer
`php artisan composer update`
Updates all dependency

## Create .env file

create .env file in the root of the project and setup database connection.

```php APP_ENV=local
 APP_DEBUG=true
 APP_KEY=
 APP_TIMEZONE=UTC

 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=blog
 DB_USERNAME=root
 DB_PASSWORD=root

 CACHE_DRIVER=array
 QUEUE_DRIVER=array
 SESSION_DRIVER=array
 ```