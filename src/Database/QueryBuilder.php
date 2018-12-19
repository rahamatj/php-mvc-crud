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
        $sql = "SELECT * FROM {$table}";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            $data = $statement->fetchAll();

            return $data;
        } catch(PDOException $e) {
            die("Whoops! Somethig went wrong!");
        }
    }

    public function find($table, $class, $id) {
        $sql = "SELECT * FROM {$table} WHERE id = :id";

        try {
            $statement = $this->pdo->prepare($sql);
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

    public function create($table, $data) {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($data);

            return $this->pdo->lastInsertId();
        } catch(PDOException $e) {
            die("Whoops! Something went wrong!");
        }
    }

    public function update($table, $data, $id) {
        $dataKeyBinds = array_map(function($key) {
            return "{$key}=:{$key}";
        }, array_keys($data));

        $sql = sprintf(
            "UPDATE %s SET %s WHERE id=:id",
            $table,
            implode(', ', $dataKeyBinds)
        );

        $data['id'] = $id;

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($data);
        } catch(PDOException $e) {
            die("Whoops! Something went wrong!");
        }
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM {$table} WHERE id=:id";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'id' => $id
            ]);
        } catch(PDOException $e) {
            die("Whoops! Something went wrong!");
        }
    }
}
