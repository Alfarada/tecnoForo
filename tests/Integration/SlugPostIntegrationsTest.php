<?php

namespace Tests\Integration;

use Tests\TestCase;
use App\{User,Post};
use Illuminate\Foundation\Testing\RefreshDatabase;

class SlugPostTest extends TestCase
{   
    use RefreshDatabase;

    function test_a_slug_is_generated_and_saved_to_the_database()
    {   
        // Having
        $user = factory(User::class)->create();
        
        $post = factory(Post::class)->make([
            'title' => 'como instalar laravel 7'
        ]);
        
        // When
        $user->posts()->save($post);
        
        // Then
        $this->assertDatabaseHas('posts',[
            'slug' => 'como-instalar-laravel-7'
        ]);

        $this->assertSame('como-instalar-laravel-7',$post->slug);
        
    }

    function test_old_urls_are_redirect()
    {   
        // Having
        $user = factory(User::class)->create(['name' => 'lorem ipsum']);
        $post = factory(Post::class)->make(['title' => 'Old title']);

        // When
        $user->posts()->save($post);
        // Get current post url
        $url = $post->url;
        // Update this post title
        $post->update(['title' => 'New title']);
        
        // Then
        $this->get($url)
            ->assertRedirect($post->url);
    }

}
