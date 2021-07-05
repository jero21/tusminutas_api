<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile';

    protected $fillable = [
        'profesion',
        'presentacion',
        'ocupacion',
        'especializacion',
        'witio_web',
        'genero',
        'telefono',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function nivelLenguaje () {
      return $this->hasMany(LenguageLevel::class, 'id_profile');
    }

    public function otherStudies () {
      return $this->hasMany(OtherStudies::class, 'id_profile');
    }

    public function rrss () {
      return $this->hasMany(Rrss::class, 'id_profile');
    }
}
