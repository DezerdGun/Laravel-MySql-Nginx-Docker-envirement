#!/bin/bash
sleep 35
composer install
php artisan migrate --force
php artisan migrate:refresh
php artisan db:seed

#500 error for
#sudo chmod -R 755 laravel_blog
#chmod -R o+w laravel/storage

php artisan key:generate
php artisan cache:clear
php artisan config:clear
set -m
php-fpm &
fg %1
