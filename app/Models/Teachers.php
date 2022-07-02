<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $fillable = [
        'user_id',
        'NIP',
        'name',
        'phone',
        'gender',
        'birth_date',
        'address',
        'foto',
    ];
}
