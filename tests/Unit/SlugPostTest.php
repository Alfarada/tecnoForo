<?php

namespace Tests\Unit;

use App\Post;
use PHPUnit\Framework\TestCase;

class SlugPostTest extends TestCase
{
    function test_adding_a_title_generates_a_slug()
    {   
        // Generate post but not save in database
        $post = new Post([
            'title' => 'como instalar laravel'
        ]);
        
        $this->assertSame('como-instalar-laravel',$post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {   
        // Generate post but not save in database
        $post = new Post([
            'title' => 'como instalar laravel'
        ]);
        
        // Changing the current post title
        $post->title = 'como instalar laravel 7';

        $this->assertSame('como-instalar-laravel-7',$post->slug);
    }

}
