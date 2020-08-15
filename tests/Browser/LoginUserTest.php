<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginUserTest extends DuskTestCase
{   
    use DatabaseMigrations;

    public function test_a_user_can_login()
    {   
        $this->browse(function (Browser $browser) {

            // Having
            $user = factory(User::class)->create();

            // When
            $browser->visit('login')
                ->assertTitle('Laravel')
                ->assertSee('Login')
                ->type('email',$user->email)
                ->type('password','password')
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee('You are logged in!');

            // Then
            $browser->assertAuthenticated();

        });

    }
}
