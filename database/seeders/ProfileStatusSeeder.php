<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileStatus;

class ProfileStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileStatus::updateOrCreate(['nombre' => 'No publicado']);
        ProfileStatus::updateOrCreate(['nombre' => 'Publicado']);
    }
}
