# PHP MVC CRUD

This is a PHP CRUD following the MVC architectural pattern.

## Feature list

* This application follows the [Standard PHP Package Skeleton](https://github.com/php-pds/skeleton)
* Has a query builder wrapper around PDO
* Has a basic router
* Has a command line tool called ```run``` which can be invoked by ```php run```
* Has a basic migration system that creates database tables
* Uses Bootstrap 4

## Installation Instructions

* ```git clone https://github.com/rahamatjahan/php-mvc-crud.git```
* ```cd php-mvc-crud```
* Create a database called ```php_mvc_crud```
* Rename ```config/database.example.php``` to ```config/database.php``` (```mv config/database.example.php config/database.php```)
* Change database configurations in ```config/database.php``` if necessary
* ```composer install```
* ```php run migrate```
* Change directory to the public folder (```cd public```) and use php's development server (```php -S localhost:8080```)
* Open up a browser and go to http://localhost:8080

If you're using something like XAMPP create a virtual host.
My router isn't built to handle something like http://localhost/dir1/dir2/php-mvc-crud/public.
