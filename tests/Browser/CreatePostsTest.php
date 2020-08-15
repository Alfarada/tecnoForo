<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreatePostsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_a_user_can_create_a_post()
    {
        $this->browse(function (Browser $browser) {

            // Having
            $user = factory(User::class)->create();
            $title = 'esta es una pregunta';
            $content = 'este es el contenido';

            // When
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

    public function test_creating_a_post_requires_authentication()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visitRoute('posts.create')
                ->assertPathIs('/login');
        });
    }
}
