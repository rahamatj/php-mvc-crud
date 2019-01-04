<?php

namespace Foundation\Database;

use PDO;
use Exception;
use PDOException;

class QueryBuilder {
    protected $pdo;
    protected $query = "";

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->query = "";
    }

    public function all($table, $class = null) {
        $sql = "SELECT * FROM {$table}";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            if($class != null)
                $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            else
                $statement->setFetchMode(PDO::FETCH_OBJ);

            $data = $statement->fetchAll();

            return $data;
        } catch(PDOException $e) {
            die("Whoops! Somethig went wrong!");
        }
    }

    public function find($table, $id, $class = null) {
        $sql = "SELECT * FROM {$table} WHERE id = :id";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                'id' => $id
            ]);

            if($class != null)
                $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            else
                $statement->setFetchMode(PDO::FETCH_OBJ);

            $data = $statement->fetch();

            if($data)
                return $data;

            throw new Exception("No data found!");
        } catch(PDOException $e) {
            die("Whoops! Something went wrong!");
        }
    }

    public function first($table, $class = null) {
        $sql = "SELECT * FROM {$table} ORDER BY id DESC LIMIT 1";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            if($class != null)
                $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            else
                $statement->setFetchMode(PDO::FETCH_OBJ);

            $data = $statement->fetch();
            
            if($data)
                return $data;

            throw new Exception('No data found!');
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

    public function select($table) {
        $this->query .= "SELECT * FROM {$table} ";

        return $this;
    }

    public function setQuery($query) {
        $this->query = $query;

        return $this;
    }

    public function getquery() {
        return $this->query;
    }

    public function orderBy($field, $order) {
        $this->query .= "ORDER BY {$field} {$order} ";

        return $this;
    }

    public function where($condition) {
        $this->query .= "WHERE {$condition} ";

        return $this;
    }

    public function andWhere($condition) {
        $this->query .= "AND {$condition} ";

        return $this;
    }

    public function OrWhere($condition) {
        $this->query .= "OR {$condition} ";

        return $this;
    }

    public function get($class = null) {
        // dd($this->query);
        try {
            $statement = $this->pdo->prepare($this->query);
            $statement->execute();
            if($class != null)
                $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            else
                $statement->setFetchMode(PDO::FETCH_OBJ);
            $data = $statement->fetchAll();

            return $data;
        } catch(PDOException $e) {
            die("Whoops! Somethig went wrong!");
        }
    }

    public function getFirst($class = null) {
        $this->query .= "LIMIT 1";
        try {
            $statement = $this->pdo->prepare($this->query);
            $statement->execute();
            if($class != null)
                $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            else
                $statement->setFetchMode(PDO::FETCH_OBJ);
            $data = $statement->fetch();

            if($data)
                return $data;

            throw new Exception('No data found!');
        } catch(PDOException $e) {
            die("Whoops! Somethig went wrong!");
        }
    }
}
