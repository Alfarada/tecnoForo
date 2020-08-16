<?php

namespace Tests;

use App\{User,Post};

trait TestHelpers
{
    protected $defaultUser;

    public function defaultUser( array $attributes = [])
    {
        (!$this->defaultUser) ?: $this->defaultUser;

        return $this->defaultUser = factory(User::class)->create($attributes);
    }

    public function createPost(array $attibutes = [])
    {
        return $this->createPost = factory(Post::class)->create($attibutes);
    }

    public function makePost(array $attibutes = [])
    {
        return $this->createPost = factory(Post::class)->make($attibutes);
    }
}