<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodTypeConfiguration extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food_type_configuration';

    protected $fillable = ['id_configuracion_minuta', 'id_tipo_comida', 'cant_maxima', 'porcentaje'];

	protected $hidden = ['created_at', 'updated_at'];

	public function configuracionMinuta () {
		return $this->belongsTo(MinutaConfiguration::class, 'id_configuracion_minuta');
	}
	public function tipoComida () {
		return $this->belongsTo(FoodType::class, 'id_tipo_comida');
	}
}
