<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(FoodSeeder::class);
		$this->call(AccountTypeSeeder::class);
		$this->call(FoodTypeSeeder::class);
		$this->call(MinutaTypeSeeder::class);
		$this->call(PropertySeeder::class);
		$this->call(UserSeeder::class);
    }
}
