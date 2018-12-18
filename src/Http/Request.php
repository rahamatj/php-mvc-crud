<?php

namespace Foundation\Http;

class Request {
    public static function uri() {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function baseUrl() {
        return sprintf(
          "%s://%s%s/",
          isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
          $_SERVER['SERVER_NAME'],
          $_SERVER['SERVER_PORT'] != '80' ? ':' . $_SERVER['SERVER_PORT'] : ''
        );
    }
}
