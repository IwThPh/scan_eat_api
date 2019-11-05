<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * Test that a user has one preference.
     *
     * @return void
     */
    public function a_user_has_a_preference()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(HasOne::class, $user->preference());
    }

    /**
     * @test
     * Test that a user has many scanned items.
     *
     * @return void
     */
    public function a_user_has_scanned_items()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $user->scanned());
    }

    /**
     * @test
     * Test that a user has many favourited items.
     *
     * @return void
     */
    public function a_user_has_favourited_items()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $user->favourites());
    }

    /**
     * @test
     * Test that a user has many allergens.
     *
     * @return void
     */
    public function a_user_has_allergens()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $user->allergens());
    }

    /**
     * @test
     * Test that a user has many diets.
     *
     * @return void
     */
    public function a_user_has_diets()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $user->diets());
    }
}
