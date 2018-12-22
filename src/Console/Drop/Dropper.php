<?php

namespace Foundation\Console\Drop;

use Migrations;

class Dropper {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function drop($args) {
        $migrations = Migrations::list();
        foreach ($args as $tableName) {
            if(array_key_exists($tableName, $migrations)) {
                $this->delete($tableName);
            } else {
                echo "{$tableName} table not found in the migrations list!"
                    . PHP_EOL;
            }
            
        }
    }

    protected function delete($tableName) {
        $sql = "DROP TABLE IF EXISTS {$tableName}";
        try {
            $this->pdo->exec($sql);
            echo "{$tableName} table dropped successfully!" . PHP_EOL;
            return true;
        } catch(PDOException $e) {
            echo $echo->getMessage();
            return false;
        }
    }
}