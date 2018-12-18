# PHP MVC CRUD

This is a PHP CRUD following the MVC architectural pattern.

## Feature list

* This application follows the [Standard PHP Package Skeleton](https://github.com/php-pds/skeleton)
* Has a query builder wrapper around PDO
* Has a basic router
* Has a command line tool called ```run``` which can be invoked by ```php run```
* Has a basic migration system that creates database tables
* Uses Bootstrap 4

## Installation Instruction

* ```git clone https://github.com/rahamatjahan/php-mvc-crud.git```
* ```cd php-mvc-crud```
* Create a database called ```php_mvc_crud```
* ```cp config/database.example.php config/database.php```
* Change database configuration in ```config/database.php``` if necessary
* ```composer install```
* ```php run migrate```
* ```cd public && php -S localhost:8080```
* Open up a browser and go to http://localhost:8080
