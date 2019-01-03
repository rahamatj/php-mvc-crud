<?php

namespace Foundation\Http;

use Foundation\Session;

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

    public function toRoute($name, $params = []) {
        $this->route($name, $params);
    }

    public function with($title, $body) {
        Session::put($title, $body);

        return $this;
    }
}
