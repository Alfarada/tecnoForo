<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_a_user_can_login()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'),[
            'email' => $user->email,
            'password' => 'password'
        ]);
        
        $response->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }
}
