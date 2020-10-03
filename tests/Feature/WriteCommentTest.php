<?php

namespace Tests\Feature;

use Tests\Browserkit;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WriteCommentTest extends Browserkit
{   
    use RefreshDatabase;

    public function test_a_user_can_write_comment()
    {   
        // Having
        $post = $this->createPost();

        $this->actingAs($user = $this->defaultUser())
            ->visit($post->url)
            ->type('Un comentario','comment')
            ->press('Publicar comentario');

        $this->seeInDatabase('comments', [
            'comment' => 'Un comentario',
            'post_id' => $post->id,
            'user_id' => $user->id
        ]);

        $this->seePageIs($post->url);
    }
}
