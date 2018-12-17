<?php

namespace Foundation\Console;

use Foundation\Database\Migration;
use Foundation\Database\Connection;

class Migrate {
    public function execute() {
        $migration = new Migration(
            Connection::make(require 'config/database.php')
        );

        $migration->migrate();
    }
}
