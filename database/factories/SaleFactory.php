<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {

    $date = Carbon::now()->subDays(rand(2, 20))->format('Y-m-d');
    return [
        'customer_id' => $faker->numberBetween($min = 1, $max = 50),
        'service_id' => $faker->numberBetween($min = 1, $max = 10),
        'total' => $faker->numberBetween($min = 1000, $max = 5000),
        'washer' => $faker->name,
        'date' => $date,
    ];
});
