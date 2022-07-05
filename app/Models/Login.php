<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'email','status'
    ];
    public function aksi($email){
        $cek_email = DB::table('users')->where('email', $email)->get('status');
        return $cek_email;
    }
}
