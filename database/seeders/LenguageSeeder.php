<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lenguage;

class LenguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lenguage::updateOrCreate(['nombre' => 'Inglés']);
    	Lenguage::updateOrCreate(['nombre' => 'Francés']);
        Lenguage::updateOrCreate(['nombre' => 'Alemán']);
        Lenguage::updateOrCreate(['nombre' => 'Italiano']);
        Lenguage::updateOrCreate(['nombre' => 'Chino Mandarín']);
        Lenguage::updateOrCreate(['nombre' => 'Japonés']);
        Lenguage::updateOrCreate(['nombre' => 'Portugués']);
        Lenguage::updateOrCreate(['nombre' => 'Criollo Haitiano']);
        Lenguage::updateOrCreate(['nombre' => 'Mapudungún']);
        Lenguage::updateOrCreate(['nombre' => 'Lenguaje de Señas']);
    }
}