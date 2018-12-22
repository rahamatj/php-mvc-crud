<?php

namespace Foundation\Console\Seed;

use Seeders;

class Table extends Seeder
{
    public function execute($args) {
        if(count($args) > 0) {
            $this->seed($args);
            return true;
        }

        return $this->outputHelp();
    }

    protected function outputHelp() {
        echo 'Available commands:' . PHP_EOL;
        echo 'php run seed table [table_name]' . PHP_EOL;
        echo PHP_EOL;
        echo 'Tables in the seeders list:' . PHP_EOL;
        foreach (array_keys(Seeders::list()) as $tableName) {
            echo $tableName . PHP_EOL;
        }

        return false;
    }
}