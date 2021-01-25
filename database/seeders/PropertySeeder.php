<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		Property::updateOrCreate(['nombre' => 'humedad', 'nombre_real' => 'Humedad', 'unidad_medida' => '%']);
		Property::updateOrCreate(['nombre' => 'energia', 'nombre_real' => 'Energía', 'unidad_medida' => 'Cal']);
		Property::updateOrCreate(['nombre' => 'proteinas', 'nombre_real' => 'Proteina', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'carbohidratos', 'nombre_real' => 'Carbohidratos', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'grasas_totales', 'nombre_real' => 'Grasas Totales', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'fibra', 'nombre_real' => 'Fibra', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'a_grasos_sat', 'nombre_real' => 'Acidos Grasos Saturados', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'a_grasos_monosat', 'nombre_real' => 'Acidos Grasos Monosaturados', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'a_grasos_polisat', 'nombre_real' => 'Acidos Grasos Polisaturados', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'a_g_omega6', 'nombre_real' => 'Acidos Grasos Omega 6', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'a_g_omega3', 'nombre_real' => 'Acidos Grasos Omega 3', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'a_g_trans', 'nombre_real' => 'Acidos Grasos Trans', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'colesterol', 'nombre_real' => 'Colesterol', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'tiamina', 'nombre_real' => 'Tiamina', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'riboflavina', 'nombre_real' => 'Riboflavina', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'niacina', 'nombre_real' => 'Niacina', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_b6', 'nombre_real' => 'Vitamina b6', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_b12', 'nombre_real' => 'Vitamina b12', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'acido_folico', 'nombre_real' => 'Acido folico', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'acido_pantotenico', 'nombre_real' => 'Acido pantotenico', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'biotina', 'nombre_real' => 'Biotina', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_c', 'nombre_real' => 'Vitamina C', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_a', 'nombre_real' => 'Vitamina A', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_e', 'nombre_real' => 'Vitamina E', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_d', 'nombre_real' => 'Vitamina D', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'vit_k', 'nombre_real' => 'Vitamina K', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'calcio', 'nombre_real' => 'Calcio', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'fosforo', 'nombre_real' => 'Fósforo', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'hierro', 'nombre_real' => 'Hierro', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'sodio', 'nombre_real' => 'Socio', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'potasio', 'nombre_real' => 'Potasio', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'magnesio', 'nombre_real' => 'Magnesio', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'yodo', 'nombre_real' => 'Yodo', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'zinc', 'nombre_real' => 'Zinc', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'manganeso', 'nombre_real' => 'Manganeso', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'selenio', 'nombre_real' => 'Selenio', 'unidad_medida' => 'g']);
		Property::updateOrCreate(['nombre' => 'cobre', 'nombre_real' => 'Cobre', 'unidad_medida' => 'g']);
  }
}
