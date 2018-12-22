<?php

use App\Post;

class PostsTableSeeder
{
    public function run() {
        for($i = 1; $i <= 10; $i++) {
            Post::create([
                'title' => "Title {$i}",
                'body' => "Body {$i}"
            ]);
        }
    }
}