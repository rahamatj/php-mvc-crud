<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../bootstrap/app.php';

use Foundation\Http\Router;
use Foundation\Http\Request;

Router::load(__DIR__ . '/../routes/web.php')
        ->direct(Request::uri(), Request::method());
