<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodType;

class FoodTypeSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		FoodType::updateOrCreate(['nombre' => 'Desayuno']);
		FoodType::updateOrCreate(['nombre' => 'Almuerzo']);
		FoodType::updateOrCreate(['nombre' => 'Once']);
		FoodType::updateOrCreate(['nombre' => 'Cena']);
		FoodType::updateOrCreate(['nombre' => 'Colación 1']);
		FoodType::updateOrCreate(['nombre' => 'Colación 2']);
		FoodType::updateOrCreate(['nombre' => 'Colación 3']);
	}
}
