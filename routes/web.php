<?php

use Foundation\Http\Route;

Route::get('/', [
    'uses' => 'PostsController@index',
    'as' => '/'
]);

Route::post('posts', [
    'uses' => 'PostsController@store',
    'as' => 'posts.store'
]);

Route::get('posts/{post}', [
    'uses' => 'PostsController@show',
    'as' => 'posts.show'
]);

Route::get('posts/{post}/edit', [
    'uses' => 'PostsController@edit',
    'as' => 'posts.edit'
]);

Route::post('posts/{post}/update', [
    'uses' => 'PostsController@update',
    'as' => 'posts.update'
]);

Route::get('posts/{post}/status/change', [
    'uses' => 'PostsController@changeStatus',
    'as' => 'posts.status.change'
]);

Route::post('posts/destroy', [
    'uses' => 'PostsController@destroy',
    'as' => 'posts.destroy'
]);
