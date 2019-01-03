<?php

use Foundation\App;
use Foundation\Session;
use Foundation\Http\Route;
use Foundation\Http\Request;
use Foundation\Http\Redirect;

function dump(...$args) {
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

function dd(...$args) {
    dump(...$args);
    die();
}

function asset($path = '/') {
    $path = trim($path, '/');
    return Request::appUrl() . '/' . $path;
}

function app() {
    return (object)App::get('app');
}

function request() {
    return new Request;
}

function mysql_date($date) {
    return date_format(date_create($date), "Y-m-d");
}

function session($title, $body = null) {
    if($body == null) {
        return Session::get($title);
    } else {
        Session::put($title, $body);
    }
}

function user_name($email) {
    $emailParts = explode("@", $email);
    return $emailParts[0];
}

function base_uri() {
    return Request::baseUri();
}

function app_url() {
    return Request::appUrl();
}

function view($name, $data = []) {
    extract($data);
    $name = str_replace(['.'], '/', $name);

    return require __DIR__ . "/../views/{$name}.view.php";
}

function redirect($path = '') {
    return Redirect::redirect($path);
}

function formatUri($uri, $params) {
    $formattedUri = $uri;

    if(!empty($params))
        $formattedUri = $uri . '?' . http_build_query($params);

    return $formattedUri != '/' ? base_uri() . $formattedUri : base_uri();
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
