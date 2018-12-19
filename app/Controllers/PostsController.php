<?php

namespace App\Controllers;

use App\Post;

class PostsController {

    public function index() {
        // var_dump(redirect()->route('/'));
        // die();
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        Post::create([
            'title' => $_POST['title'],
            'body' => $_POST['body']
        ]);

        // return header("Location: http://localhost:8080/");
        return redirect()->route('/');
    }

    public function edit() {
        return view('posts.edit');
    }

    public function show() {
        return view('posts.show', [
            'post' => Post::find($_GET['post'])
        ]);
    }
}
