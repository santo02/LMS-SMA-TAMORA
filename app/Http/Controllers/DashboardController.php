<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $jmlhSiswa  = User::where('role', 'student')->count();
        $jmlhGuru  = User::where('role', 'teacher')->count();

        if(Auth::user()->role == 'admin'){
            return view('dashboard-admin.dashboard', compact('jmlhSiswa', 'jmlhGuru'));
        }
        if(Auth::user()->role == 'teacher'){
            return view('dashboard-admin.dashboard', compact('jmlhSiswa', 'jmlhGuru'));
        }
        if(Auth::user()->role == 'student'){
            return view('dashboard-admin.dashboard', compact('jmlhSiswa', 'jmlhGuru'));
        }


    }

}
