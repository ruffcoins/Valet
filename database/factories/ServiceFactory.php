<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween($min = 1000, $max = 5000),
        'name' => $faker->word,
    ];
});
