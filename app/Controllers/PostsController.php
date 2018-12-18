<?php

namespace App\Controllers;

use App\Post;

class PostsController {

    public function index() {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function edit() {
        return view('posts.edit');
    }

    public function show() {
        $id = $_GET['post'];
        // var_dump($id);
        //$post = Post::find($_GET['post']);
        return view('posts.show');
    }
}
