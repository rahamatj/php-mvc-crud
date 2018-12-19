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

    public function store() {
        $postId = Post::create([
            'title' => $_POST['title'],
            'body' => $_POST['body']
        ]);

        return redirect()->route('posts.show', [
            'post' => $postId
        ]);
    }

    public function edit() {
        return view('posts.edit', [
            'post' =>Post::find($_GET['post'])
        ]);
    }

    public function update() {
        $post = Post::find($_GET['post']);
        $post->update([
            'title' => $_POST['title'],
            'body' => $_POST['body']
        ]);

        return redirect()->route('posts.show', [
            'post' => $post->id
        ]);
    }

    public function show() {
        return view('posts.show', [
            'post' => Post::find($_GET['post'])
        ]);
    }
}
