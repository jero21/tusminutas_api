<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStatus extends Model
{
    use HasFactory;

    protected $table = 'profile_status';

    protected $fillable = ['nombre'];

    protected $hidden = ['created_at', 'updated_at'];
}
