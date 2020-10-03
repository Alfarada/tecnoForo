<?php

use Illuminate\Support\Facades\Route;

// Routes that require authentication.

// Section posts
Route::get('/posts/create', 'CreatePostController@create')
    ->name('posts.create');

Route::post('/posts/create', 'CreatePostController@store')
    ->name('posts.store');

// Comments

Route::get('/comments/create', 'CommentController@create')
    ->name('comments.create');

Route::post('/comments/{post}/create', 'CommentController@store')
    ->name('comments.store');