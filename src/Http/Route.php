<?php

namespace Foundation\Http;

class Route extends Router {

    public static function routes() {
        return static::$routes;
    }

    public static function get($uri, array $route) {
        static::$routes['GET'][$uri] = $route;
    }

    public static function post($uri, array $route) {
        static::$routes['POST'][$uri] = $route;
    }
}
