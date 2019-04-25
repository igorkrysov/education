<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DictionariesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDictionaries()
    {
        $response = $this->get(route('dictionaries'));
        $response->assertStatus(200);
    }
}
