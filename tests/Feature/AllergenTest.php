<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllergenTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * A test to retrieve all allergens.
     *
     * @return void
     */
    public function allergens_can_be_retrieved()
    {
        $allergens = factory(\App\Allergen::class, 10)->create();
        $response = $this->get('/api/allergens');
        $response->assertStatus(200);
    }
}
