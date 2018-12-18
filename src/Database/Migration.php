<?php

namespace Foundation\Database;
use PDO;
use PDOException;

class Migration {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function migrate() {
        $migrations = require 'database/migrations.php';
        foreach($migrations as $migration) {
            $migration = new $migration();
            $this->create($migration->build());
        }
    }

    public function create($table) {
        try {
            $this->pdo->exec($table->sql());
            echo "{$table->name()} table created successfully!" . PHP_EOL;
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
