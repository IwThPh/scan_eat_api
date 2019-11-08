<?php

namespace Tests\Feature;

use App\User;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Resources\Product as ProductResource;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * A product can be retrieved locally.
     *
     * @return void
     */
    public function a_product_can_be_retrieved_locally()
    {
        $this->withoutExceptionHandling();

        $product = factory(Product::class)->create();

        $json = [
            'id' => $product->id, 'barcode' => $product->barcode,'name' => $product->name,
            'weight_g' => $product->weight_g,'energy_100g' => $product->energy_100g,
            'carbohydrate_100g' => $product->carbohydrate_100g,'protein_100g' => $product->protein_100g,
            'fat_100g' => $product->fat_100g,'fiber_100g' => $product->fiber_100g,
            'salt_100g' => $product->salt_100g,'sugar_100g' => $product->sugar_100g,
            'saturated_100g' => $product->saturated_100g,'sodium_100g' => $product->sodium_100g,
            'created_at' => $product->created_at->toDateTimeString(),'updated_at' => $product->updated_at->toDateTimeString(),
        ];

        $response = $this->get('api'.$product->path());
        $response->assertStatus(200)
                 ->assertExactJson($json);
    }

    /**
     * @test
     * A product can be retrieved from external API.
     *
     * @return void
     */
    public function a_product_can_be_retrieved_externally()
    {
        $this->withoutExceptionHandling();

        $json = [
            'barcode',
            'name',
            'weight_g',
            'energy_100g',
            'carbohydrate_100g',
            'protein_100g',
            'fat_100g',
            'fiber_100g',
            'salt_100g',
            'sugar_100g',
            'saturated_100g',
            'sodium_100g',
        ];

        $response = $this->get('api'.'/product/737628064502');
        $response->assertStatus(200)
                 ->assertJsonStructure($json);
    }
}
