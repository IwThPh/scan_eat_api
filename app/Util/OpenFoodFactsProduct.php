<?php

namespace App\Util;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class OpenFoodFactsProduct
{

    protected $client;

    /**
     *
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
        $raw = $this->endpointRequest('product/' . $barcode . '.json');
        $product = [
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
        $unit = Arr::get($raw, 'product.nutriments.energy_unit', 'kcal');
        $kcalToKJ = 4.184;


        if ($unit == 'kJ') {
            $product['energy_100g'] = $product['energy_100g'] / $kcalToKJ;
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
