<?php

use Foundation\Http\Route;

Route::get('/', [
    'uses' => 'PostsController@index',
    'as' => '/'
]);

Route::get('posts/create', [
    'uses' => 'PostsController@create',
    'as' => 'posts.create'
]);

Route::post('posts', [
    'uses' => 'PostsController@store',
    'as' => 'posts.store'
]);

Route::get('posts/show', [
    'uses' => 'PostsController@show',
    'as' => 'posts.show'
]);

Route::get('posts/edit', [
    'uses' => 'PostsController@edit',
    'as' => 'posts.edit'
]);

Route::post('posts/{post}/update', [
    'uses' => 'PostsController@update',
    'as' => 'posts.update'
]);

Route::post('posts/destroy', [
    'uses' => 'PostsController@destroy',
    'as' => 'posts.destroy'
]);
