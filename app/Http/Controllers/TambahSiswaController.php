<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahSiswaController extends Controller
{
    public function index(){
        return view('dashboard-admin.TambahSiswa');
    }
    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'required|string|max:20',
            'NIS' => 'required|string|unique:students',
            'phone' => 'required|string',
            'email' => 'required|string|unique:users',
            'address' => 'required|string',
            'username' => 'required|string',
        ]);

       User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'username' => $fields['username'],
            'password' => bcrypt('Siswa123'),
            'role' => "student"
        ]);
        $id = DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
        foreach($id as $i){
            $id_user = $i->id;
        }
        Students::create([
            'user_id' => $id_user,
            'NIS' => $fields['NIS'],
            'phone' => $fields['phone'],
            'address' => $fields['address'],
        ]);

        return ('berhasil' );
    }

}
