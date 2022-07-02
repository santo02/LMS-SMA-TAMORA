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
            'email' => 'required|string|unique:users',
            'name' => 'required|string|max:20',
            'NIS' => 'required|string|unique:students',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',

        ]);

       User::create([
            'email' => $fields['email'],
            'password' => bcrypt('siswa123'),
            'status' => "aktif",
            'role' => "student"
        ]);
        $id = DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
        foreach($id as $i){
            $id_user = $i->id;
        }
        Students::create([
            'name' => $fields['name'],
            'user_id' => $id_user,
            'NIS' => $fields['NIS'],
            'gender' => $fields['gender'],
            'phone' => $fields['phone'],
            'address' => $fields['address'],
            'birth_date' => $fields['birth_date'],
            'foto' => 'profile.png'
        ]);

        return redirect('/list-siswa')->with('success', 'Berhasil menambahkan');


    }


}
