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
        return App::get('query')->find(static::$table, $id, static::class);
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

    public static function orderBy($field, $order) {
        App::get('query')->setQuery(
            App::get('query')->orderBy($field, $order)
                                ->getQuery()
        );

        return new static;
    }

    public static function where($condition) {
        App::get('query')->setQuery(
            App::get('query')->where($condition)
                            ->getQuery()
        );

        return new static;
    }

    public function andWhere($condition) {
        App::get('query')->setQuery(
            App::get('query')->andWhere($condition)
                            ->getQuery()
        );

        return new static;
    }

    public function orWhere($condition) {
        App::get('query')->setQuery(
            App::get('query')->orWhere($condition)
                            ->getQuery()
        );

        return new static;
    }

    public function get() {
        $table = static::$table;
        App::get('query')->setQuery(
            "SELECT * FROM {$table} " . App::get('query')->getQuery()
        );
        return App::get('query')->get(static::class);
    }

    public function getFirst() {
        $table = static::$table;
        App::get('query')->setQuery(
            "SELECT * FROM {$table} " . App::get('query')->getQuery()
        );
        return App::get('query')->getFirst(static::class);
    }
}
