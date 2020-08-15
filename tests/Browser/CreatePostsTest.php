<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreatePostsTest extends DuskTestCase
{
    use DatabaseMigrations;

    function test_a_user_can_create_a_post()
    {   
        // Having
        $user = factory(User::class)->create();
        $title = 'esta es una pregunta';
        $content = 'este es el contenido';

        // When
        $this->browse(function (Browser $browser) use ($user,$title,$content) {
  
            $browser->loginAs($user)
                ->visit('/posts/create')
                ->type('title', $title)
                ->type('content', $content)
                ->press('Publicar')
                ->assertSee($title);

            // Then
            $this->assertDatabaseHas('posts', [
                'title' => $title,
                'content' => $content,
                'pending' => true,
                'user_id' => $user->id
            ]);
        });
    }

    function test_creating_a_post_requires_authentication()
    {
        $this->browse(function (Browser $browser){
            $browser->visitRoute('posts.create')
                ->assertPathIs('/login');
        });
    }

    function test_create_post_from_validation()
    {   
        // Having
        $user = factory(User::class)->create();

        // When
        $this->browse(function (Browser $browser) use ($user) {

            $browser->loginAs($user)
                ->visitRoute('posts.create')
                ->press('Publicar')
                ->assertSeeIn('@title-error','El campo título es obligatorio')
                ->assertSeeIn('@content-error','El campo contenido es obligatorio')
                ;
        });
    }
}
