<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinutaConfiguration extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'minuta_configuration';

    protected $fillable = ['id_minuta', 'id_propiedad', 'cant_maxima'];

    protected $hidden = ['created_at', 'updated_at'];

    public function minuta () {
		return $this->belongsTo(Minuta::class, 'id_minuta');
	}

	public function propiedad () {
		return $this->belongsTo(Property::class, 'id_propiedad');
	}
	public function configuracionTipoComida () {
		return $this->hasMany(FoodTypeConfiguration::class, 'id_configuracion_minuta');
	}}
