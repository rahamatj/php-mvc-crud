<?php

namespace Foundation\Console\Migrate;

use Migrations;

class Migrator {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function migrate($args) {
        $migrations = Migrations::list();
        foreach($args as $tableName) {
            if(array_key_exists($tableName, $migrations)) {
                $migration = new $migrations[$tableName]();
                $this->create($migration->build());
            } else {
                echo "{$tableName} table not found in the migrations list!"
                    . PHP_EOL;
            }
        }
    }

    protected function create($table) {
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
