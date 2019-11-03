<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Diet;
use Faker\Generator as Faker;

$factory->define(diet::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});
