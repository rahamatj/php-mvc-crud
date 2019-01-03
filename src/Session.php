<?php

namespace Foundation;

class Session {
    public static function put($title, $body) {
        session_start();
        $_SESSION[$title] = $body;
    }

    public static function has($title) {
        session_start();
        return isset($_SESSION[$title]);
    }

    public static function get($title) {
        if(static::has($title)) {
            $body = $_SESSION[$title];
            unset($_SESSION[$title]);
            
            return $body;
        } else {
            return false;
        }
    }
}