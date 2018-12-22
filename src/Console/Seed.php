<?php

namespace Foundation\Console;

use Foundation\App;

class Seed {

    protected $commandsWhitelist = [
        'all' => 'Foundation\Console\Seed\All',
        'table' => 'Foundation\Console\Seed\Table'
    ];

    public function execute($args) {
        if(count($args) > 0) {
            $commandName = array_shift($args);
            
            if(array_key_exists($commandName, $this->commandsWhitelist)) {
                return $this->executeCommand(
                    $this->commandsWhitelist[$commandName], $args
                );
            }

            return $this->outputHelp();
        }

        return $this->outputHelp();
    }

    protected function executeCommand($commandClass, $args) {
        $command = new $commandClass(App::get('pdo'));
        return $command->execute($args);
    }

    protected function outputHelp() {
        echo 'Available commands:' . PHP_EOL;
        foreach($this->commandsWhitelist as $key => $value) {
            echo 'php run seed ' . $key . PHP_EOL;
        }

        return false;
    }
}
