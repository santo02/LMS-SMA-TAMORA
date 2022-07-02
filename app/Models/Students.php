<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'NIS',
        'name',
        'phone',
        'gender',
        'status',
        'birth_date',
        'address',
        'foto',
    ];
}
