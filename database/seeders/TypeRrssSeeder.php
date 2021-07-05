<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeRrss;

class TypeRrssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeRrss::updateOrCreate(['nombre' => 'Instagram']);
    	TypeRrss::updateOrCreate(['nombre' => 'Facebook']);
        TypeRrss::updateOrCreate(['nombre' => 'Youtube']);
        TypeRrss::updateOrCreate(['nombre' => 'Linkedin']);
        TypeRrss::updateOrCreate(['nombre' => 'TikTok']);
    }
}