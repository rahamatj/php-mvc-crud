<?php

namespace Foundation\Http;

class Redirect {

    public static function redirect($path) {
        if($path != '')
            header("Location: {$path}");
        else
            return new static;
    }

    public function route($name, $params = []) {
        $route = route($name, $params);

        header("Location: {$route}");
    }
}
