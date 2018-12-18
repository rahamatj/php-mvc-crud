<?php

namespace Foundation\Database;

use Foundation\App;

trait Query {
    protected static $table = '';

    public static function class() {
        return static::class;
    }

    public static function all() {
        return App::get('query')->all(static::$table, static::class);
    }

    public static function table() {
        return static::$table;
    }
}
