<?php

namespace Foundation\Http;

class Route extends Router {

    public static function routes() {
        return static::$routes;
    }

    public static function getRoutes() {
        return static::$routes['GET'];
    }

    public static function getUris() {
        return array_keys(static::getRoutes());
    }

    public static function getControllerActions() {
        return array_column(static::getRoutes(), 'uses');
    }

    public static function getNames() {
        return array_column(static::getRoutes(), 'as');
    }

    public static function postRoutes() {
        return static::$routes['POST'];
    }

    public static function postUris() {
        return array_keys(static::postRoutes());
    }

    public static function postControllerActions() {
        return array_column(static::postRoutes(), 'uses');
    }

    public static function postNames() {
        return array_column(static::postRoutes(), 'as');
    }

    public static function getRoutesWithNamesAsKeys() {
        $routes = array_map(function($uri, $controllerAction) {
            return [
                'uses' => $controllerAction,
                'uri' => $uri
            ];
        }, static::getUris(), static::getControllerActions());

        return array_combine(static::getNames(), $routes);
    }

    public static function postRoutesWithNamesAsKeys() {
        $routes = array_map(function($uri, $controllerAction) {
            return [
                'uses' => $controllerAction,
                'uri' => $uri
            ];
        }, static::postUris(), static::postControllerActions());

        return array_combine(static::postNames(), $routes);
    }

    public static function routesWithNamesAsKeys() {
        return [
            'GET' => static::getRoutesWithNamesAsKeys(),
            'POST' => static::postRoutesWithNamesAsKeys()
        ];
    }

    public static function get($uri, array $actions) {
        $uri = trim($uri, '/') ?: '/';
        static::$routes['GET'][$uri] = $actions;
    }

    public static function post($uri, array $actions) {
        $uri = trim($uri, '/') ?: '/';
        static::$routes['POST'][$uri] = $actions;
    }
}
