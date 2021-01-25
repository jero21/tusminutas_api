<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMinuta extends Model
{
    use HasFactory;

     protected $table = 'client_minuta';

     protected $fillable = [
		'nombre',
		'correo',
		'comentario',
		'link_activo'
	];

	protected $hidden = ['created_at', 'updated_at'];
}
