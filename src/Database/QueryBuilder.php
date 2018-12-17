<?php

namespace Foundation\Database;

class QueryBuilder {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        return "all";
    }
}
