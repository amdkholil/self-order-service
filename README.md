<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<h3 align="center">Self Order Service</h3>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About

Aplikasi ini memungkinkan pelanggan untuk memesan makanan dan minuman langsung dari perangkat mobile mereka tanpa beranjak dari meja kafe, mengurangi waktu tunggu dalam mengantri dan memberikan kemudahan dalam bertransaksi. 

## Requirements

1. PHP8.2 or above
2. nodejs v20.19 or above
3. mysql/mariadb


## Setup

1. clone this repository
2. run `composer install`
3. copy `.env.example` to `.env`
4. setup your database in `.env` file
5. run `php artisan key:generate`
6. run `php artisan storage:link`
7. run `php artisan migrate --seed`
8. run `php artisan serve`
9. run `npm run dev` or `npm run dev`
10. run `php artisan serve`
11. open in your browser http://localhost:8000
