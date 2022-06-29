<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
    $role = DB::table('users')->where('id', $id)->select('role')->get();
    if($role[0]->role == 'teacher'){
        return 'test';
    }
    elseif($role[0]->role == 'student'){
        $user =   DB::table('users')->join('students', 'students.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('users.name', 'users.email', 'users.password','students.nis', 'students.phone', 'students.address')
            ->get();
    }



        return view('editprofile', ["users" => $user, "role" => $role[0]]);
    }
}
