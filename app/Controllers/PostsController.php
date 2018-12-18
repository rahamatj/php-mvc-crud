<?php

namespace App\Controllers;

use Foundation\Http\Route;

class PostsController {
    public function index() {
        var_dump(redirect()->route('test', [
            'test' => 1,
            'ok' => 2
        ]));
    }

    public function test() {

    }
}
