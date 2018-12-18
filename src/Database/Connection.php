<?php

namespace Foundation\Database;

use PDO;
use PDOException;

class Connection {
    public static function make($config) {
        try {
            return new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['name'],
                $config['user'],
                $config['password'],
                $config['options']
            );
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}
