<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * Test that a product is able to be scanned.
     *
     * @return void
     */
    public function a_product_has_a_path()
    {
        $product = factory(Product::class)->create();
        $this->assertEquals("/product/".$product->barcode, $product->path());
    }

    /**
     * @test
     * Test that a product is able to be scanned.
     *
     * @return void
     */
    public function a_product_can_be_scanned()
    {
        $product = factory(Product::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $product->scanned());
    }

    /**
     * @test
     * Test that a product can contain allergens.
     *
     * @return void
     */
    public function a_product_contains_allergens()
    {
        $product = factory(Product::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $product->allergens());
    }

    /**
     * @test
     * Test that a product fits diets.
     *
     * @return void
     */
    public function a_product_fits_diets()
    {
        $product = factory(Product::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $product->diets());
    }
}
