<?php

use Foundation\App;
use Foundation\Http\Route;
use Foundation\Http\Request;
use Foundation\Http\Redirect;

function view($name, $data = []) {
    extract($data);
    $name = str_replace(['.'], '/', $name);

    return require __DIR__ . "/../views/{$name}.view.php";
}

function redirect($path = '') {
    return Redirect::redirect($path);
}

function formatUriParams($uri, $params) {
    $paramKeys = array_map(function($paramKey) {
        return "{" . $paramKey . "}";
    }, array_keys($params));

    $formattedUri = str_replace($paramKeys, $params, $uri);
    return $formattedUri != '/' ? $formattedUri : '';
}

function route($name, $params = []) {
    $getRoutes = Route::getRoutesWithNamesAsKeys();
    $postRoutes = Route::postRoutesWithNamesAsKeys();

    if(array_key_exists($name, $getRoutes))
        return base_url() . formatUriParams($getRoutes[$name]['uri'], $params);
    else if(array_key_exists($name, $postRoutes))
        return base_url() . formatUriParams($postRoutes[$name]['uri'], $params);
    else
        throw new Exception("No route defined for this name!");
}

function app() {
    return (object)App::get('app');
}

function base_url(){
    return Request::baseUrl();
}
