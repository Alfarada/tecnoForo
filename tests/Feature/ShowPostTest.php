<?php

namespace Tests\Feature;

use Tests\Browserkit;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostTest extends Browserkit
{
    use RefreshDatabase;

    public function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser(['name' => 'lorem ipsum']);
        $post = $this->createPost(['user_id' => $user->id]);
        
        // When
        $this->visit($post->url)
            // Then
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }
}
