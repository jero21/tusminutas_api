<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Minuta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'minutas';

    protected $fillable = [
      'uuid', 
      'nombre', 
      'descripcion', 
      'comidas', 
      'totales', 
      //'id_tipo_minuta', 
      'id_user', 
      'id_minuta_cliente'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected static function boot()
  	{
    	parent::boot();

    	self::creating(function ($model) {
      	$model->uuid = (string) Uuid::generate();
    	});
  	}
  	public function getRouteKeyName()
  	{
    	return 'uuid';
  	}

    public function user() {
      return $this->belongsTo(User::class, 'id_user');
    }
    public function tipoMinuta () {
      return $this->belongsTo(MinutaType::class, 'id_tipo_minuta');
    }
    public function configuracionMinutas () {
      return $this->hasMany(MinutaConfiguration::class, 'id_minuta');
    }
}
