<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MinutaType;

class MinutaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MinutaType::updateOrCreate(['nombre' => 'nutricionista']);
    	MinutaType::updateOrCreate(['nombre' => 'paciente']);
    }
}