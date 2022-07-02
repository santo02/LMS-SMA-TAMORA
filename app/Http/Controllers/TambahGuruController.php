<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahGuruController extends Controller
{
    public function index(){
        return view('dashboard-admin.TambahGuru');
    }

    public function store(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|unique:users',
            'name' => 'required|string|max:20',
            'NIP' => 'required|string|unique:teachers',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
        ]);

       User::create([
        'email' => $fields['email'],
        'password' => bcrypt('guru123'),
        'status' => "aktif",
        'role' => "teacher"
        ]);
        $id = DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
        foreach($id as $i){
            $id_user = $i->id;
        }
        Teachers::create([
            'name' => $fields['name'],
            'user_id' => $id_user,
            'NIP' => $fields['NIP'],
            'gender' => $fields['gender'],
            'phone' => $fields['phone'],
            'address' => $fields['address'],
            'birth_date' => $fields['birth_date'],
            'foto' => 'profile.png'

        ]);

        return redirect('/list-guru')->with('success', 'Berhasil menambahkan');
    }


}
