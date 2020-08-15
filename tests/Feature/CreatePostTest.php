<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_authenticated_user_can_create_a_post()
    {   
        $this->actingAs(factory(User::class)->create());

        $this->get(route('posts.create'))
            ->assertStatus(200);
    }

    public function test_a_guest_user_cannot_crea_a_post()
    {
        $this->get(route('posts.create'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
