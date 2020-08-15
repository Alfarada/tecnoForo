<?php

use Illuminate\Support\Facades\Route;

// Routes that require authentication.

// Section posts
Route::get('/posts/create', 'CreatePostController@create')
    ->name('posts.create');

Route::post('/posts/create', 'CreatePostController@store')
    ->name('posts.store');