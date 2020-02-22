<?php

namespace Tests\Feature;

use App\User;
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
}
