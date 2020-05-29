<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 50)->create();
        factory(App\Expense::class, 100)->create();
        factory(App\Service::class, 10)->create();
        factory(App\Sale::class, 100)->create();
        

    }
}