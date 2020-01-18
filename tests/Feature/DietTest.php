<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DietTest extends TestCase
{
    /**
     * @test
     * A test to retrieve all diets.
     *
     * @return void
     */
    public function diets_can_be_retrieved()
    {
        $diets = factory(\App\Diet::class, 5)->create();
        $response = $this->get('/api/diets');
        $response->assertStatus(200);
    }
}
