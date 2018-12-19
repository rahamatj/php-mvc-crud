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

function base_url(){
    return Request::baseUrl();
}

function formatUri($uri, $params) {
    $formattedUri = $uri;

    if(!empty($params))
        $formattedUri = $uri . '?' . http_build_query($params);

    return $formattedUri != '/' ? base_url() . $formattedUri : base_url();
}

function route($name, $params = []) {
    $getRoutes = Route::getRoutesWithNamesAsKeys();
    $postRoutes = Route::postRoutesWithNamesAsKeys();

    if(array_key_exists($name, $getRoutes))
        return formatUri($getRoutes[$name]['uri'], $params);
    else if(array_key_exists($name, $postRoutes))
        return formatUri($postRoutes[$name]['uri'], $params);
    else
        throw new Exception("No route defined for this name!");
}

function app() {
    return (object)App::get('app');
}
