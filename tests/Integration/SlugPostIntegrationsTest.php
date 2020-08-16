<?php

namespace Tests\Integration;

use App\{User,Post};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

}
