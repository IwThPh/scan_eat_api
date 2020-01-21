<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Preference;
use Faker\Generator as Faker;

$factory->define(preference::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'energy_max' => 2000,
        'carbohydrate_max' => 325,
        'protein_max' => 50,
        'fat_max' => 70,
        'fiber_max' => 30,
        'salt_max' => 6,
        'sugar_max' => 90,
        'saturated_max' => 20,
        'sodium_max' => 2.3,
    ];
});
