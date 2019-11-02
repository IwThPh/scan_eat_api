<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Preference;
use Faker\Generator as Faker;

$factory->define(preference::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create() - id;
        },
        'energy_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'carbohydrate_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'protein_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'fat_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'fiber_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'salt_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'sugar_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'saturated_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'sodium_max' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
    ];
});
