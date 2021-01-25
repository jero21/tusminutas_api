<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountType;

class AccountTypeSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		AccountType::updateOrCreate(['nombre' => 'Profesional']);
	}
}
