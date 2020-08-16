<?php

namespace Tests\Unit;

use App\Post;
use PHPUnit\Framework\TestCase;

class SlugPostTest extends TestCase
{
    function test_adding_a_title_generates_a_slug()
    {   
        // Having - Generate post but not save in database
        $post = new Post([
            'title' => 'como instalar laravel'
        ]);
        
        // Then
        $this->assertSame('como-instalar-laravel',$post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {   
        // Having - Generate post but not save in database
        $post = new Post([
            'title' => 'como instalar laravel'
        ]);
        
        // When - Editing the current post title
        $post->title = 'como instalar laravel 7';
        
        // Then
        $this->assertSame('como-instalar-laravel-7',$post->slug);
    }
}
