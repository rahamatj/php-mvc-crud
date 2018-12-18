<?php

namespace App\Controllers;

class PostsController {
    public function index() {
        return view('posts.index');
    }

    public function create() {
        return view('posts.create');
    }

    public function edit() {
        return view('posts.edit');
    }

    public function show() {
        return view('posts.show');
    }
}
