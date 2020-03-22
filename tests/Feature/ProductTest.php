<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');
        $user = factory(User::class)->create();
        Passport::actingAs($user);
    }

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
            'id' => $product->id, 'barcode' => $product->barcode, 'name' => $product->name,
            'weight_g' => $product->weight_g, 'serving_g' => $product->serving_g, 'energy_100g' => $product->energy_100g,
            'carbohydrate_100g' => $product->carbohydrate_100g, 'protein_100g' => $product->protein_100g,
            'fat_100g' => $product->fat_100g, 'fiber_100g' => $product->fiber_100g,
            'salt_100g' => $product->salt_100g, 'sugar_100g' => $product->sugar_100g,
            'saturated_100g' => $product->saturated_100g, 'sodium_100g' => $product->sodium_100g,
            'created_at' => $product->created_at, 'updated_at' => $product->updated_at,
        ];

        $response = $this->get('api' . $product->path());
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
            'serving_g',
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

        $response = $this->get('api' . '/product/737628064502');
        $response->assertStatus(200)
            ->assertJsonStructure($json);
    }

    /**
     * @test
     * A product retrieved from external API is added to local database.
     *
     * @return void
     */
    public function a_product_retrieved_externally_is_added()
    {
        $this->withoutExceptionHandling();
        $this->refreshDatabase();

        $barcode = '0737628064502';
        $response = $this->get('api' . '/product/' . $barcode);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'barcode' => $barcode,
        ]);
    }

    /**
     * @test
     * A 203 response error expected when external API does not have information.
     *
     * @return void
     */
    public function a_product_retrieved_externally_does_not_exist()
    {
        $this->withoutExceptionHandling();
        $this->refreshDatabase();

        $barcode = '0700000000000';
        $response = $this->get('api' . '/product/' . $barcode);

        $response->assertStatus(203);
        $this->assertDatabaseMissing('products', [
            'barcode' => $barcode,
        ]);
    }
}
