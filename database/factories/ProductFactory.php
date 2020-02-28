<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'barcode' => $faker->ean13,
        'name' => $faker->sentence($nbWords=3),
        'weight_g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 1, $max=5000),
        'serving_g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 1, $max=100),
        'energy_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'carbohydrate_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'protein_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'fat_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'fiber_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'salt_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'sugar_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'saturated_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
        'sodium_100g' => $faker->randomFloat($nbMaxDecimals = 2, $min= 0, $max=100),
    ];
});
