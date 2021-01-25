<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
		if (!User::where('email', 'admin@tuminuta.com')->first()) {
			User::create([
				'nombre' => 'Admin',
				'email' => 'admin@tuminuta.com',
				'password' => bcrypt('TusMinutas.12345'),
				'id_tipo_cuenta' => 1,
			]);
		}
	}
}
