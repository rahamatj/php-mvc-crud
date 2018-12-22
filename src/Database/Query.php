<?php

namespace Foundation\Database;

use Foundation\App;

trait Query {
    protected static $table = '';

    public static function class() {
        return static::class;
    }

    public static function table() {
        return static::$table;
    }

    public static function all() {
        return App::get('query')->all(static::$table, static::class);
    }

    public static function find($id) {
        return App::get('query')->find(static::$table, static::class, $id);
    }

    public static function first() {
        return App::get('query')->first(static::$table, static::class);
    }

    public static function create($data) {
        return App::get('query')->create(static::$table, $data);
    }

    public function update($data) {
        return App::get('query')->update(static::$table, $data, $this->id);
    }

    public function delete() {
        return APP::get('query')->delete(static::$table, $this->id);
    }
}
