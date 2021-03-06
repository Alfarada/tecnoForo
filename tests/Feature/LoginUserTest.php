<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_a_user_can_login()
    {   
        // Having
        $user = $this->defaultUser();

        // When
        $response = $this->post(route('login'),[
            'email' => $user->email,
            'password' => 'password'
        ]);

        // Then 
        $response->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }
}
