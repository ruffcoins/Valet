<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expense;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Expense::class, function (Faker $faker) {
    $date = Carbon::now()->subDays(rand(2, 20))->format('Y-m-d');
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->e164PhoneNumber,
        'expense_name' => $faker->word,
        'expense_cost' => $faker->numberBetween($min = 1000, $max = 5000),
        'expense_purpose' => $faker->word,
        'expense_date' => $date,
    ];
});
