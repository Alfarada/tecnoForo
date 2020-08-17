<?php

namespace Tests\Feature;

use App\Post;
use Carbon\Carbon;
use Tests\Browserkit;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsListTest extends Browserkit
{   
    use RefreshDatabase;

    function test_a_user_can_see_the_posts_lists_and_go_to_the_details()
    {   
        // Having a post with default user
        $post = $this->createPost(['title' => 'debo usar laravel 6 o 7']);

        $this->visit('/')
            ->seeInElement('h1', 'Posts')
            ->see($post->title)
            ->click($post->title)
            ->seePageIs($post->url);
    }

    function test_the_posts_are_paginated()
    {
        $first = $this->createPost([
            'title' => 'post mas antiguo',
            'created_at' => Carbon::now()->subDays(2)]);

        factory(Post::class)->times(15)->create([
            'created_at' => Carbon::now()->subDay()]);

        $last = $this->createPost([
            'title' => 'post mas reciente',
            'created_at' => Carbon::now()]);

        $this->visit('/')
            ->see($last->title)
            ->dontSee($first->title)
            ->click('2')
            ->see($first->title)
            ->dontSee($last->title);
    }
}
