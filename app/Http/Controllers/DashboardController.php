<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jmlhSiswa  = User::where('role', 'student')->count();
        $jmlhGuru  = User::where('role', 'teacher')->count();

        return view('dashboard-admin.dashboard', compact('jmlhSiswa', 'jmlhGuru'));
    }
    public function CountSiswa(){

    }
}
