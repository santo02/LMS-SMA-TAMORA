<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function listsiswa(){
        // Retrieve data from 'students' and join it with 'users'
        $students = DB::table('students')
        ->join('users', 'user_id', '=', 'users.id')
        // Select specific columns from the joined tables
        ->select('users.email','users.status as status', 'students.*', 'users.id as id')
        // Get all the rows from the query
        ->get();

        // Return the view with the retrieved data
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
        // Find the user by ID
        $user = User::find(Request()->id);
    
        // Change the user's status based on their current status
        $data = ($user->status == 'aktif') ? 'nonaktif' : 'aktif';
        $user->status = $data;
    
        // Save the changes to the database
        $user->save();
    
        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Berhasil ganti status');
    }
    
}
