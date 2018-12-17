<?php

use Foundation\App;
use Foundation\Database\Connection;
use Foundation\Database\QueryBuilder;

App::bind('database', require 'config/database.php');
App::bind('query', new QueryBuilder(
    Connection::make(App::get('database'))
));
