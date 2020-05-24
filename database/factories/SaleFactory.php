<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {

    return [
        'customer_id' => $faker->numberBetween($min = 1, $max = 20),
        'service_id' => $faker->numberBetween($min = 1, $max = 5),
        'total' => $faker->numberBetween($min = 1000, $max = 5000),
        'washer' => $faker->name,
        'date' => $faker->date($format = 'Y-m-d', $max = 'now') // '1979-06-09',
    ];
});
