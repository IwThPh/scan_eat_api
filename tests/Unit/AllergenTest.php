<?php

namespace Tests\Unit;

use App\Allergen;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AllergenTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * A test if an allergen can have many users.
     *
     * @return void
     */
    public function an_allergen_can_have_many_users()
    {
        $allergen = factory(Allergen::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $allergen->users());
    }

    /**
     * @test
     * A test if an allergen can have many products.
     *
     * @return void
     */
    public function an_allergen_can_have_many_products()
    {
        $allergen = factory(Allergen::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $allergen->products());
    }
}
