<?php

namespace Foundation\Database;

use PDO;
use Exception;
use PDOException;

class QueryBuilder {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all($table, $class) {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table}");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            $data = $statement->fetchAll();

            return $data;
        } catch(PDOException $e) {
            die("Whoops! Somethig went wrong!");
        }
    }

    public function find($table, $class, $id) {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
            $statement->execute([
                'id' => $id
            ]);
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            $data  = $statement->fetch();

            if($data)
                return $data;

            throw new Exception("No data found!");
        } catch(PDOException $e) {
            die("Whoops! Something went wrong!");
        }
    }
}
