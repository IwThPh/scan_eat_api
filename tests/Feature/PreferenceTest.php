<?php

namespace Tests\Feature;

use App\Http\Resources\Preference as PreferenceResource;
use App\Preference;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PreferenceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Represents expected structure
     */
    protected $jsonStruct = [
        'user_id',
        'energy_max',
        'carbohydrate_max',
        'protein_max',
        'fat_max',
        'fiber_max',
        'salt_max',
        'sugar_max',
        'saturated_max',
        'sodium_max',
        'carbohydrate_1',
        'carbohydrate_2',
        'protein_1',
        'protein_2',
        'fat_1',
        'fat_2',
        'fiber_1',
        'fiber_2',
        'salt_1',
        'salt_2',
        'sugar_1',
        'sugar_2',
        'saturated_1',
        'saturated_2',
        'sodium_1',
        'sodium_2',
    ];

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');
    }

    /**
     * @test
     * A user can retrieves default preferences, if none set previously.
     *
     * @return void
     */
    public function a_user_retrieves_default_prefs()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);

        $response = $this->get('/api/preferences');

        $response->assertStatus(200)
            ->assertJsonStructure($this->jsonStruct);
    }

    /**
     * @test
     * A user can retrieve existing preferences.
     *
     * @return void
     */
    public function a_user_retrieves_custom_prefs()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);

        //Create and save non default Preference
        $pref = factory(Preference::class)->make(['energy_max' => 2500]);
        $user->preference()->save($pref);
        $prefRes = new PreferenceResource($pref);

        $response = $this->get('/api/preferences');

        $response->assertStatus(200)
            ->assertJsonStructure($this->jsonStruct)
            ->assertJson($prefRes->jsonSerialize());
    }

    /**
     * @test
     * A user can update existing preferences.
     *
     * @return void
     */
    public function a_user_updates_prefs()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);

        //Create and save non default Preference
        $pref = factory(Preference::class)->make();
        $user->preference()->save($pref);

        //Changes to be made.
        $changes = [
            // 'energy_max' => 2500,
            // 'carbohydrate_max' => 260,
            'protein_max' => 50,
            'fat_max' => 50,
            'fiber_max' => 25,
            'salt_max' => 5,
            'sugar_max' => 70,
            'saturated_max' => 25,
            'sodium_max' => 2,
        ];

        $response = $this->patch('/api/preferences', $changes);

        $response->assertStatus(200)
            ->assertJsonStructure($this->jsonStruct)
            ->assertJson($changes);
    }

    /**
     * @test
     * A user can reset existing preferences to default.
     *
     * @return void
     */
    public function a_user_reset_prefs()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\User::class)->create();
        Passport::actingAs($user);

        //Create and save non default Preference
        $pref = factory(Preference::class)->make(['energy_max' => 2500]);
        $user->preference()->save($pref);

        $response = $this->delete('/api/preferences');

        //Create default Preference to test
        $pref = factory(Preference::class)->make(['user_id' => $user->id]);
        $prefRes = new PreferenceResource($pref);

        $response->assertStatus(200)
            ->assertJsonStructure($this->jsonStruct)
            ->assertJson($prefRes->jsonSerialize());
    }
}
