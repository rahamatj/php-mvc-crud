<?php

namespace Foundation\Http;

use Foundation\App;

class Request {
    public static function uri() {
        $uri = trim(substr(static::fullUri(), strlen(static::appUrl())), '/');
        if(static::appUrl() != '' && $uri !== false) {
            return $uri ?: '/';
        }
        return static::requestUri();
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function fullUri() {
        return sprintf("%s://%s%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' 
                ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['SERVER_PORT'] != '80' 
                ? ':' . $_SERVER['SERVER_PORT'] : '',
            trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') 
                ? "/" . trim(
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
                    ) 
                : ""
        );
    }

    public static function requestUri() {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') 
            ?: '/';
    }

    public static function baseUri() {
        if(static::appUrl() != '')
            return static::appUrl() . '/';
        
        return sprintf(
            "%s://%s%s/",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['SERVER_PORT'] != '80' 
                ? ':' . $_SERVER['SERVER_PORT'] : ''
        );
    }

    public static function appUrl() {
        return trim(App::get('app')['url'], '/');
    }
}
