<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleDetailController extends Controller
{
    public function show($id, $week){

        $module = DB::table('modules')
        ->join('courses', 'modules.course_id', '=', 'courses.id')
        ->join('teachers', 'teachers.id', '=', 'modules.theachers_id')
        ->join('users', 'users.id', '=', 'teachers.user_id')
        ->where('courses.id', '=', $id)
        ->where('modules.week', '=', $week)
        ->select('modules.*', 'users.name')
        ->get();

        return view('dashboard-siswa.materi', ["module" => $module]);

    }
}
