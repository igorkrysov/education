<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttentionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAttention()
    {
        $response = $this->get(route('attention'));
        $response->assertStatus(200);
    }
}
