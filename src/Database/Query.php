<?php

namespace Foundation\Database;

use Foundation\App;

trait Query {
    protected static $table = '';

    public static function all() {
        return App::get('query')->all();
    }

    public static function table() {
        return static::$table;
    }
}
