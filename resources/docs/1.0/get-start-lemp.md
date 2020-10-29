# get start LEMP
1. [Need install LEMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04) and also check [laravel installation](https://laravel.com/docs/8.x/)
2. [install composer](https://getcomposer.org/download/)
3. copy or create ENV - [help about choice env variable](env.md)
    - `cp .env.example .env`
4. create database in  `database/database.sqlite` and update in .env
5. migrate database with `php artisan migrate`
6. if need seeder run `php artisan db:seed`
7. create passport key with `php artisan passport:install`
8. run server local server with `php artisan serve` or connect to webserver with `public/index.php`

