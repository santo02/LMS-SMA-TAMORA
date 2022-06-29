<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $fillable = [
        'course_id',
        'module_id',
        'topic',
        'sesison_date',
        'content',
        'week',
        'sesion',
        'file',
        'theachers_id',
    ];
}
