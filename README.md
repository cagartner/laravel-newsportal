## News Portal built with Laravel Framework

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.


## Install

First you will need to clone the project

Then you go to project directory and run

`composer install`

Then create a database named start_laravel then rename .env.example to .env and change database configuration values to yours.

`cp .env.example .env`

Then run

`php artisan key:generate`

Then

`php artisan migrate`

## Create Admin User

You can use below custom command to create Admin user

`php artisan make:admin`

It waill ask you for admin information  Like (name, email, password)

## Roadmap
- Create Seeds for default values and setting
- Change delete to SoftDelete
- Update to Laravel 5.5
- Localization

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
