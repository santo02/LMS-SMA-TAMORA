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
        ->select('users.email','users.status as status', 'students.*', 'users.id as id')
        ->get();

        return view('dashboard-admin.list-siswa',['students'=> $students]);
    }

    public function listguru(){
        $teachers = DB::table('teachers')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('users.email', 'users.status as status','teachers.*', 'users.id as id')
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

    public function changeStatus(){
        $users = User::find(Request()->id);

        if($users->status == 'aktif'){
            $data = 'nonaktif';
        }else{
            $data = 'aktif';
        }

        $users->status = $data;
        $users->save();

        return redirect()->back()->with('success', 'Berhasil ganti status');
    }
}
