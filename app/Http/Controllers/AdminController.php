<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function listsiswa(){
        $students = DB::table('students')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('users.email','users.status', 'students.*')
        ->get();

        return view('dashboard-admin.list-siswa',['students'=> $students]);
    }

    public function listguru(){
        $teachers = DB::table('teachers')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('users.email', 'users.status','teachers.*')
        ->get();

        return view('dashboard-admin.list-guru',['teachers'=> $teachers]);
    }

    public function deleteguru($id){
        User::destroy($id);

        return redirect()->route('list-guru')->with('success', 'Berhasil Dihapus');
    }

    public function deletesiswa($id){
        User::destroy($id);

        return redirect()->route('list-siswa')->with('success', 'Berhasil Dihapus');
    }
}
