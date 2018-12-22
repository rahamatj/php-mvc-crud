<?php

namespace Foundation\Console;

class Run {

    protected $commandsWhitelist = [
        'migrate' => 'Foundation\Console\Migrate',
        'drop' => 'Foundation\Console\Drop',
        'seed' => 'Foundation\Console\Seed'
    ];

    public function execute($args) {
        if(count($args) > 1) {
            $executable = array_shift($args);
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

    protected function outputHelp() {
        echo 'Available commands:' . PHP_EOL;
        foreach($this->commandsWhitelist as $key => $value) {
            echo 'php run ' . $key . PHP_EOL;
        }

        return false;
    }

    protected function executeCommand($commandClass, $args) {
        $command = new $commandClass;
        return $command->execute($args);
    }
}
