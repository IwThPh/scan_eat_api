<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Allergen;
use Faker\Generator as Faker;

$factory->define(allergen::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'alt' => [1 => 'alt'],
    ];
});
