# Laravel-Payment-Gateway

This is a simple Laravel dockerized project that demonstrates how to integrate and work with a payment gateway in a very basic and beginner-friendly way. It serves as a practical guide for understanding the full flow of a simple product ordering system. <br> <br>

In this project, products are displayed, and users can add products to the cart successfully. All cart and order data are stored in the database. The implementation follows a straightforward approach for placing an order, making it easy to learn and follow. <br> <br>

Each function is clearly commented to help developers understand the workflow step by step. This project is designed as a learning guide to simplify the process of working with payment gateways and basic e-commerce logic in Laravel.

I create this project by using 'laravel-docker-alin-version' project. <br> <br>

I use 'sslcommerz (sslcommerz.com)'.

## These routes should be defined in the API routes file (`routes/api.php`):

- `/success` → Handles successful payment callback
- `/fail` → Handles failed payment callback
- `/cancel` → Handles cancelled payment callback <br> <br>

To create api route <br>

```
php artisan install:api
```

## Last Modifed Date

12-May-2026 by Alin

## Run The Project

docker compose up -d

## Modify '.env' file from 'src' folder according to docker-compose.yml

```
APP_URL=http://localhost:8011
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=testdb
DB_USERNAME=alin
DB_PASSWORD=12345678
```

(You should take the database information from the MySQL section of the docker-compose.yml file and put it exactly as it is into the src/.env file.)

## Run this command for migration

docker compose run --rm project php artisan migrate

## Run this command to run the project

'docker compose up -d'

(it will create mysql folder in root directory)

## Visit the project and open the database server

App Visit: https://localhost:8011 <br>
Database Visit: https://localhost:8080

## Run other command before adding 'docker compose run --rm project'

Such as:
<br>

1. 'docker compose run --rm project php artisan storage:link'
   <br>
2. 'docker compose run --rm project composer install packagename'
