# Consume the PayPal API

The idea is to set up a dummy order, consume the PayPal API and enable the user to purchase the order. 
Subsequently, the PayPal response shall be  caught and processed into a success or failure message to the user. 

On my personal journal you'll find a [post](https://janchristlieb.de/journal/consume-the-paypal-api) that features this project and provides further information on the technical approach. 

## Installation
```php
// 1. clone the repo
git@github.com:jchristlieb/paypal_api.git

// 2. install dependencies 
composer install

// 3. create .env.local and fill in db_user, db_password,
// db_name, PAYPAL_CLIENT_ID, PAYPAL_CLIENT_SECRET
cp .env .env.local

// 4. create database
bin/console doctrine:database:create

// 5. execute migrations
bin/console doctrine:migrations:migrate

// 6. create dummy data
bin/console doctrine:fixtures:load

// 7. start server
bin/console server:start
```