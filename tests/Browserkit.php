<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class Browserkit extends \Laravel\BrowserKitTesting\TestCase
{   
    use  CreatesApplication, RefreshDatabase;

    public $baseUrl = 'http://tecnoforo.test';

    public function seeErrors(array $fields)
    {
        foreach ($fields as $name => $errors) {
            foreach ((array) $errors as $message) {
                $this->seeInElement(
                    "#field_{$name} .invalid-feedback",
                    $message
                );
            }
        }
    }
}


