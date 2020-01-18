<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');
    }

    /**
     * @test
     * A user can obtain an access token.
     *
     * @return void
     */
    public function a_user_obtain_access_token()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->postJson('api/auth/token', [
                'username' => $user->email,
                'password' => 'password',
                'scope' => '*',
            ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token_type', 'expires_in', 'access_token', 'refresh_token']);
    }

    /**
     * @test
     * a user can register.
     *
     * @return void
     */
    public function a_user_can_register()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();

        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->postJson('api/auth/register', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => 'password',
                'confirm_password' => 'password',
            ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token_type', 'expires_in', 'access_token', 'refresh_token']);
    }

    /**
     * @test
     * a user can revoke tokens.
     *
     * @return void
     */
    public function a_user_can_revoke_token()
    {
        $this->withoutExceptionHandling();

        Passport::actingAs(factory(User::class)->create());
        $user = auth()->user();
        $user->createToken('ScanEatAPI')->accessToken;
        $response = $this->post('api/auth/revoke')
            ->assertStatus(200);
    }
}
