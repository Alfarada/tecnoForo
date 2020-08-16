<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Browserkit;

class PostsListTest extends Browserkit
{   
    use RefreshDatabase;

    public function test_a_user_can_see_the_posts_lists_and_go_to_the_details()
    {
        $post = $this->createPost(['title' => 'debo usar laravel 6 o 7']);

        $this->visit('/')
            ->seeInElement('h1', 'Posts')
            ->see($post->title)
            ->click($post->title)
            ->seePageIs($post->url);
    }
}
