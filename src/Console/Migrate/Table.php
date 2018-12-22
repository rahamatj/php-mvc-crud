<?php

namespace Foundation\Console\Migrate;

use Migrations;

class Table extends Migrator
{
    public function execute($args) {
        if(count($args) > 0) {
            $this->migrate($args);
            return true;
        }

        return $this->outputHelp();
    }

    protected function outputHelp() {
        echo 'Available commands:' . PHP_EOL;
        echo 'php run migrate table [table_name]' . PHP_EOL;
        echo PHP_EOL;
        echo 'Tables in the migrations list:' . PHP_EOL;
        foreach (array_keys(Migrations::list()) as $tableName) {
            echo $tableName. PHP_EOL;
        }

        return false;
    }
}