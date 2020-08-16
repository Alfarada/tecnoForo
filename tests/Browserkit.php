<?php

namespace Tests;

class Browserkit extends \Laravel\BrowserKitTesting\TestCase
{   
    use  CreatesApplication, TestHelpers;

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


