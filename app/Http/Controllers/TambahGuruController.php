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
            'name' => 'required|string|max:20',
            'NIP' => 'required|string|unique:teachers',
            'phone' => 'required|string',
            'email' => 'required|string|unique:users',
            'address' => 'required|string',
            'username' => 'required|string',
        ]);

       User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'username' => $fields['username'],
            'password' => bcrypt('guru123'),
            'role' => "teacher"
        ]);
        $id = DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
        foreach($id as $i){
            $id_user = $i->id;
        }
        Teachers::create([
            'user_id' => $id_user,
            'NIP' => $fields['NIP'],
            'phone' => $fields['phone'],
            'address' => $fields['address'],

        ]);

        return redirect('/list-guru')->with('success', 'Berhasil menambahkan');
    }


}
