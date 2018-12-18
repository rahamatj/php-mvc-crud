<?php

namespace App\Controllers;

use Foundation\Http\Route;

class PostsController {
    public function index() {
        var_dump(Route::routes());
    }
}
