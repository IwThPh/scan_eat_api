<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Facade;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllergenTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');
    }

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

    /**
     * @test
     * A user can select allergens
     *
     * @return void
     */
    public function user_can_select_allergens()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);
        $allergens = factory(\App\Allergen::class, 10)->create();

        $response = $this->post('/api/allergens', [1,2,3]);
        $response->assertStatus(200);
        $this->assertTrue($user->allergens->contains(1));
        $this->assertFalse($user->allergens->contains(4));
    }
}
