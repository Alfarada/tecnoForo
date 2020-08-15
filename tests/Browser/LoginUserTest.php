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
        // Having
        $user = factory(User::class)->create();

        // When
        $this->browse(function (Browser $browser) use ($user) {
            
            $browser->visit('login')
                ->type('email',$user->email)
                ->type('password','password')
                ->press('Login')
                ->assertPathIs('/home');
        });

    }
}
