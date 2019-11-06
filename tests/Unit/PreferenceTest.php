<?php

namespace Tests\Unit;

use App\Preference;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PreferenceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * Test that a preference belongs to one user.
     *
     * @return void
     */
    public function a_preference_has_one_user()
    {
        $pref = factory(Preference::class)->create();
        $this->assertInstanceOf(BelongsTo::class, $pref->user());
    }

}
