<?php

use Foundation\App;
use Foundation\Database\Connection;
use Foundation\Database\QueryBuilder;

App::bind('app', require __DIR__ . '/../config/app.php');
App::bind('database', require __DIR__ . '/../config/database.php');
App::bind('pdo', Connection::make(App::get('database')));
App::bind('query', new QueryBuilder(App::get('pdo')));

require __DIR__ . '/../src/helpers.php';
