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
        'fibre_max' => 30,
        'salt_max' => 6,
        'sugar_max' => 90,
        'saturated_max' => 20,
        'sodium_max' => 2.3,
        'carbohydrate_1' => 0.5,
        'carbohydrate_2' => 0.7,
        'protein_1'=> 0.5,
        'protein_2'=> 0.7,
        'fat_1'=> 0.5,
        'fat_2'=> 0.7,
        'fibre_1'=> 0.5,
        'fibre_2'=> 0.7,
        'salt_1'=> 0.5,
        'salt_2'=> 0.7,
        'sugar_1'=> 0.5,
        'sugar_2'=> 0.7,
        'saturated_1'=> 0.5,
        'saturated_2'=> 0.7,
        'sodium_1'=> 0.5,
        'sodium_2'=> 0.7,
    ];
});
