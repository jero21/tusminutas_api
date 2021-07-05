<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rrss extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rrss';

    protected $fillable = [
        'url',
        'id_type_rrss',
        'id_profile'
    ];

    protected $hidden = ['created_at', 'updated_at'];

}
