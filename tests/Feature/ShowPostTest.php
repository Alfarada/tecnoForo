<?php

namespace Tests\Feature;

use App\{User, Post};
use Tests\Browserkit;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostTest extends Browserkit
{
    use RefreshDatabase;

    public function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = factory(User::class)->create([
            'name' => 'lorem ipsum'
        ]);

        $post = factory(Post::class)->make([
            'title' => 'titulo del post',
            'content' => 'contenido del post'
        ]);

        $user->posts()->save($post);

        // When
        $this->visit($post->url)
            
            // Then
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);
    }
}
