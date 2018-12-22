<?php

namespace Foundation\Database;

class Table {
    protected $name;
    protected $sql = "CREATE TABLE IF NOT EXISTS %s ( %s ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    protected $fields = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function name() {
        return $this->name;
    }

    public function increments($fieldName) {
        $this->fields[] = "{$fieldName} int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT";
    }

    public function integer($fieldName) {
        $this->fields[] = "{$fieldName} int(10) NOT NULL";
    }

    public function tinyInteger($fieldName) {
        $this->fields[] = "{$fieldName} tinyint(1) NOT NULL";
    }

    public function decimal($fieldName, $m = 10, $d = 2) {
        $this->fields[] = "{$fieldName} DECIMAL({$m}, ${d}) NOT NULL";
    }

    public function enum($fieldName, $values) {
        $this->fields[] = "{$fieldName} ENUM(" . implode($values) . ") NOT NULL";
    }

    public function string($fieldName) {
        $this->fields[] = "{$fieldName} varchar(191) NOT NULL";
    }

    public function text($fieldName) {
        $this->fields[] = "{$fieldName} text NOT NULL";
    }

    public function boolean($fieldName) {
        $this->fields[] = "{$fieldName} tinyint(1) NOT NULL";
    }

    public function date($fieldName) {
        $this->fields[] = "{$fieldName} DATE NOT NULL";
    }

    public function dateTime($fieldName) {
        $this->fields[] = "{$fieldName} DATETIME NOT NULL";
    }

    public function timestamp($fieldName) {
        $this->fields[] = "{$fieldName} TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
    }

    public function sql() {
        return sprintf($this->sql, $this->name, implode(', ', $this->fields));
    }
}
