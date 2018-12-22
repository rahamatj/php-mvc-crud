<?php

namespace Foundation\Console\Seed;

use Seeders;

class Seeder {
    public function seed($args) {
        $seeders = Seeders::list();
        foreach ($args as $tableName) {
            if(array_key_exists($tableName, $seeders)) {
                $seeder = new $seeders[$tableName];
                $seeder->run();
                echo "{$tableName} table seeded successfully!" . PHP_EOL;
            } else {
                echo "{$tableName} table not found in the seeders list!"
                    . PHP_EOL;
            }
            
        }
    }
}