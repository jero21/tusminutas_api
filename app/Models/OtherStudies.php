<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherStudies extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'other_studies';

    protected $fillable = [
        'nombre',
        'lugar',
    ];

    protected $hidden = ['created_at', 'updated_at'];

}
