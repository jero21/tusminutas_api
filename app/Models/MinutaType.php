<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinutaType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'minuta_type';

    protected $fillable = ['nombre'];

    protected $hidden = ['created_at', 'updated_at'];
}
