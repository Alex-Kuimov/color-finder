#!/bin/sh
set -e

echo "Deploying application ..."

php artisan down

echo "Get from git"
git pull origin master

echo "Install Frontend"
npm install
npm run build

echo "Migrate DB"
php artisan migrate --force
php artisan optimize

echo "Clear cache"
php artisan cache:clear
php artisan config:clear
php artisan route:clear

php artisan up
echo "Application deployed!"