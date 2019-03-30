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

* ```git clone https://github.com/rahamatj/php-mvc-crud.git```
* ```cd php-mvc-crud```
* Create a database called ```php_mvc_crud```
* Rename ```config/database.example.php``` to ```config/database.php```
(```mv config/database.example.php config/database.php```)
* Change database configurations in ```config/database.php``` if necessary.
* Edit the ```config/app.php```. The app won't work if you don't put the url field properly.
* ```composer install```
* ```php run migrate all```
* ```php run seed all```
* Change directory to the public folder (```cd public```) and use php's development server (```php -S localhost:8080```)
* Open up a browser and go to http://localhost:8080

## Run Command
```php run``` invokes the run cli tool.

### Available commands
* ```php run migrate table [table_name]``` migrates a table which is specified in the migrations list (```database/migrations/Migrations.php```).
* ```php run migrate all``` migrates all tables in the migrations list.
* ```php run seed table [table_name]``` seeds a table which is specified in the seeders list (```database/seeders/Seeders.php```).
* ```php run seed all``` seeds all tables in the seeders list.
* ```php run drop table [table_name]``` drops a table which is specified in the migrations list.
* ```php run drop all``` drops all tables in the migrations list.

## Create a migration file
* Create a migration file inside ```database/migrations``` folder.
* See the ```database/migrations/posts_table.php``` for a migration file structure.
* See the ```src/Database/Table.php``` for the Table class API. This is just experimental, doesn't have the full set of tools which you might find in a typical migration library.
* Add the table name and the migration file's class name as ```key```, ```value``` pair inside the migrations list's (```database/migrations/Migrations.php```) ```list``` function.
