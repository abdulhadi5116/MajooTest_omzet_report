<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Description
Test Case project for Back End Engineer recruitment at Majoo Indonesia. Display Revenue of sales from the designated Month and implement Login management.

## Stack
- PHP ^7.4 | 8
- Laravel ^8.0 + Fortify (For Login Management)
- MariaDB ^10.5.0 | MySQL

## About Laravel

- [Documentation](https://laravel.com/docs)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Repository Setup

Default URL : http://localhost:8000

## Installation
1. clone the repository
2. Install the dependency using composer
```
composer install
```
3. Create `.env` file by copying it from `.env.example` and set the environment variable value in that file.
4. Generate Laravel application key
```
php artisan key:generate
```
5. Generate JWT Auth Secret
```
php artisan jwt:secret
```
6. Create database and add to .env | default Database = `omzet_report`

7. Run database migration and seeder
```
php artisan migrate:fresh --seeder
```
8. Run Laravel development server
```
php artisan serve
```
