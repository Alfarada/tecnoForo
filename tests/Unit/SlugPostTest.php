<?php

namespace Tests\Unit;

use App\Post;
use PHPUnit\Framework\TestCase;

class SlugPostTest extends TestCase
{
    function test_adding_a_title_generates_a_slug()
    {   
        $post = new Post([
            'title' => 'como instalar laravel'
        ]);

        $this->assertSame('como-instalar-laravel',$post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {
        $post = new Post([
            'title' => 'como instalar laravel'
        ]);

        $post->title = 'como instalar laravel 7';

        $this->assertSame('como-instalar-laravel-7',$post->slug);
    }

}
