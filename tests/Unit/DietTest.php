<?php

namespace Tests\Unit;

use App\Diet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DietTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * @test
     * A test if a diet can have many users.
     *
     * @return void
     */
    public function a_diet_can_have_many_users()
    {
        $diet = factory(Diet::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $diet->users());
    }

    /**
     * @test
     * A test if a diet can have many products.
     *
     * @return void
     */
    public function a_diet_can_have_many_products()
    {
        $diet = factory(Diet::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $diet->products());
    }
}
