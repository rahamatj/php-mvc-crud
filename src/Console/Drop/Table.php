<?php

namespace Foundation\Console\Drop;

use Migrations;

class Table extends Dropper
{
    public function execute($args) {
        if(count($args) > 0) {
            $this->drop($args);
            return true;
        }

        return $this->outputHelp();
    }

    protected function outputHelp() {
        echo 'Available commands:' . PHP_EOL;
        echo 'php run drop table [table_name]' . PHP_EOL;
        echo PHP_EOL;
        echo 'Tables in the migrations list:' . PHP_EOL;
        foreach (array_keys(Migrations::list()) as $tableName) {
            echo $tableName. PHP_EOL;
        }

        return false;
    }
}