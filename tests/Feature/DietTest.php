<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DietTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');
    }

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

    /**
     * @test
     * A user can select diets
     *
     * @return void
     */
    public function user_can_select_diets()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);
        $allergens = factory(\App\Diet::class, 10)->create();

        $response = $this->post('/api/diets', [1,2,3]);
        $response->assertStatus(200);
        $this->assertTrue($user->diets->contains(1));
        $this->assertFalse($user->diets->contains(4));
    }

}
