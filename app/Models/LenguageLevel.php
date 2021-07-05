<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenguageLevel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lenguage_level';

    protected $fillable = ['nivel_manejo', 'id_lenguage', 'id_profile'];

    protected $hidden = ['created_at', 'updated_at'];

    public function lenguaje() {
      return $this->belongsTo(Lenguage::class, 'id_lenguage');
    }

}
