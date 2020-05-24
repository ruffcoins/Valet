<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'car_reg_no' => $faker->lexify('???') . '-' . $faker->numerify('###') . '-' . $faker->lexify('??'),
        'phone' => $faker->e164PhoneNumber,
        'transaction_count' => $faker->randomDigit,
        'total_amount' => $faker->numberBetween($min = 1000, $max = 100000),
    ];
});
