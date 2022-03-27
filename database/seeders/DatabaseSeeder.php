<?php

namespace Database\Seeders;

use CreatePaymentPlatformsTable;
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
        $this->call(PaymentPlatformSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(PaqueteSeeder::class);
        $this->call(PermissionTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
