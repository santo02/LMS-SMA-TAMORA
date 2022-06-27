<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listsiswa(){
        return view('dashboard-admin.list-siswa');
    }
    public function listguru(){
        return view('dashboard-admin.list-guru');
    }
}
