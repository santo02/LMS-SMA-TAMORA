<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'jurusan',
        'deskripsi',
        'theachers_id',
        'enroll_key',
    ];
}
