# Laravel-Payment-Gateway

Laravel-Payment-Gateway is a dockerized project for payment gateway with sslcommerz (sslcommerz.com). I create this project by using 'laravel-docker-alin-version' project. Very simple and basic guide. Just see the 'addToCart' function from DemoController.php file.

## Last Modifed Date

06-May-2026 by Alin

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
