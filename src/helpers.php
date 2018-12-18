<?php

use Foundation\Http\Route;
use Foundation\Http\Redirect;

function view($name, $data = []) {
    extract($data);
    $name = str_replace(['.'], '/', $name);

    return require "views/{$name}.view.php";
}

function redirect($path = '') {
    return Redirect::redirect($path);
}

function formatUriParams($uri, $params) {
    $paramKeys = array_map(function($paramKey) {
        return "{" . $paramKey . "}";
    }, array_keys($params));

    return str_replace($paramKeys, $params, $uri);
}

function route($name, $params = []) {
    $getRoutes = Route::getRoutesWithNamesAsKeys();
    $postRoutes = Route::postRoutesWithNamesAsKeys();

    if(array_key_exists($name, $getRoutes))
        return formatUriParams($getRoutes[$name]['uri'], $params);
    else if(array_key_exists($name, $postRoutes))
        return formatUriParams($postRoutes[$name]['uri'], $params);
    else
        throw new Exception("No route defined for this name!");
}
