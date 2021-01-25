<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionistFood extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nutritionist_foods';

    protected $fillable = [
		'nombre',
		'grupo',
		'subgrupo',
		'porcentaje_perdida',
		'id_user',
		'origen',
		'gramos',
		'porcion',
		'humedad',
		'energia',
		'proteinas',
		'carbohidratos',
		'grasas_totales',
		'fibra',
		'a_grasos_sat',
		'a_grasos_monosat',
		'a_grasos_polisat',
		'a_g_omega6',
		'a_g_omega3',
		'a_g_trans',
		'colesterol',
		'tiamina',
		'riboflavina',
		'niacina',
		'vit_b6',
		'vit_b12',
		'acido_folico',
		'acido_pantotenico',
		'biotina',
		'vit_c',
		'vit_a',
		'vit_e',
		'vit_d',
		'vit_k',
		'calsio',
		'fosforo',
		'hierro',
		'sodio',
		'potasio',
		'magnecio',
		'yodo',
		'zinc',
		'manganeso',
		'selenio',
		'cobre',
	];

	protected $hidden = [
		'created_at', 'updated_at',
	];

}
