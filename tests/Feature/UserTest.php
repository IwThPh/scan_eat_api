<?php

namespace Tests\Feature;

use App\User;
use App\Product;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');
    }

    /**
     * @test
     * A test to retrieve user information.
     *
     * @return void
     */
    public function user_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        Passport::actingAs(factory(User::class)->create());
        $user = auth()->user();
        $user->createToken('ScanEatAPI')->accessToken;

        $json = [
            'name',
            'email',
        ];

        $response = $this->post('api/user')
            ->assertStatus(200)
            ->assertJsonStructure($json);
    }

    /**
     * @test
     * A test to retrieve user history.
     *
     * @return void
     */
    public function user_can_retrieved_history()
    {
        $this->withoutExceptionHandling();

        Passport::actingAs(factory(User::class)->create());
        $user = auth()->user();
        $user->scanned()->attach(factory(Product::class, 10)->create());

        $response = $this->post('api/user/history')
            ->assertStatus(200)
            ->assertJsonCount(10);
    }

    /**
     * @test
     * A test to retrieve user saved items.
     *
     * @return void
     */
    public function user_can_retrieved_saved()
    {
        $this->withoutExceptionHandling();

        Passport::actingAs(factory(User::class)->create());
        $user = auth()->user();
        $user->scanned()->attach(factory(Product::class, 5)->create());
        $user->scanned()->attach(factory(Product::class, 5)->create(), ['saved' => true]);

        $response = $this->post('api/user/saved');
        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }
}
