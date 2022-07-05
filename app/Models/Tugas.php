<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_course',
        'bab',
        'topik',
        'T_mulai',
        'T_akhir',
        'Deskripsi',
        'file',
        'lampiran',
    ];
}
