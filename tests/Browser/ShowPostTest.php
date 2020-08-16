<?php

namespace Tests\Browser;

use App\{Post,User};
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowPostTest extends DuskTestCase
{   
    use DatabaseMigrations;

    public function test_a_user_can_see_the_post_details()
    {   
        // Having
        $user = factory(User::class)->create([
            'name' => 'lorem ipsum'
        ]);

        $post = factory(Post::class)->make([
            'title' => 'titulo del post',
            'content' => 'contenido del post'
        ]);

        $user->posts()->save($post);
        
        // When
        $this->browse(function (Browser $browser) use ($post,$user) {
            $browser->visitRoute('posts.show', [$post->id,$post->slug])
                    ->assertSeeIn('h1',$post->title)
                    ->assertSee($post->content)
                    ->assertSee($user->name);
        });
    }
}
