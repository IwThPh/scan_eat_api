<?php

namespace App\Util;

use App\Allergen;
use App\Diet;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class OpenFoodFactsProduct
{

    protected $client;

    /**
     *  Constructs OpenFoodFacts API service.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Gets Raw Json Response from OpenFoodFacts API.
     */
    public function getRawProduct($barcode)
    {
        return $this->endpointRequest('product/' . $barcode . '.json');
    }

    /**
     * Gets Filtered array from OpenFoodFacts API.
     */
    public function getProduct($barcode)
    {
        $raw = $this->getRawProduct($barcode);

        $nutrient_per = Arr::get($raw, 'product.nutrient_data_per');
        $product = [
            'status' => Arr::get($raw, 'status', 0),
            'barcode' => Arr::get($raw, 'code', 0),
            'name' => Arr::get($raw, 'product.product_name', 'Name Not Found'),
            'weight_g' => Arr::get($raw, 'product.product_quantity', 100),
            'serving_g' => Arr::get($raw, 'product.serving_quantity', 100),
            'energy_100g' => Arr::get($raw, 'product.nutriments.energy_100g', 0),
            'carbohydrate_100g' => Arr::get($raw, 'product.nutriments.carbohydrates_100g', 0),
            'protein_100g' => Arr::get($raw, 'product.nutriments.proteins_100g', 0),
            'fat_100g' => Arr::get($raw, 'product.nutriments.fat_100g', 0),
            'fiber_100g' => Arr::get($raw, 'product.nutriments.fiber_100g', 0),
            'salt_100g' => Arr::get($raw, 'product.nutriments.salt_100g', 0),
            'sugar_100g' => Arr::get($raw, 'product.nutriments.sugars_100g', 0),
            'saturated_100g' => Arr::get($raw, 'product.nutriments.saturated-fat_100g', 0),
            'sodium_100g' => Arr::get($raw, 'product.nutriments.sodium_100g', 0),
        ];

        if ($product['status'] == 1) {
            if (Arr::get($raw, 'product.nutriments.energy_unit', 'kcal') == 'kcal') {
                $product['energy_100g'] = $product['energy_100g'];
            } else {
                $product['energy_100g'] = $product['energy_100g'] / 4.184;
            }
            $product = new Product($product);
            $product->save();

            $lc = 'en:'; // Locale for OFF API.

            //Allergen Collection
            $traceCollection = collect(Arr::get($raw, 'product.traces_hierarchy', []))->map(function ($item) use ($lc) {
                return Str::lower(Str::after($item, $lc));
            });
            $allergenCollection = collect(Arr::get($raw, 'product.allergens_heirarchy', []))->map(function ($item) use ($lc) {
                return Str::lower(Str::after($item, $lc));
            });
            foreach (Allergen::all() as $a) {
                $alt = $a -> alt;
                $traceInt = array_intersect($alt, $traceCollection->toArray());
                $allergenInt = array_intersect($alt, $allergenCollection->toArray());
                if (count($allergenInt) > 0 || count($traceInt) > 0) {
                    $product->allergens()->attach($a);
                }
            }

            //Diet Collection
            $analysisCollection = collect(Arr::get($raw, 'product.ingredients_analysis_tags', []))->map(function ($item) use ($lc) {
                return Str::lower(Str::after($item, $lc));
            });
            foreach (Diets::all() as $d) {
                $analysisInt = array_intersect($d->alt, $analysisCollection);
                if (count($analysisInt) > 0) {
                    $product->diets()->attach($d);
                }
            }
        } else {
            $product = null;
        }
        return $product;
    }

    /**
     * Submits GET request to OpenFoodFacts API.
     *
     * @return array
     */
    public function endpointRequest($url)
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            return [];
        }
        return $this->responseHandler($response->getBody()->getContents());
    }

    /**
     * Returns response based on contents.
     *
     * @return array
     */
    public function responseHandler($response)
    {
        if ($response) {
            return json_decode($response, true);
        }
        return [];
    }
}
