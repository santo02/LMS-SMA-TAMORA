<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleSiswaController extends Controller
{
    public function index($id){
        $nis = DB::table('courses')
        ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
        ->join('students', 'students.id', '=', 'my_courses.student_id')
        ->join('users', 'users.id', '=', 'students.user_id')
        ->where('courses.id', '=', $id)
        ->select('students.NIS', 'users.name')
        ->get();


        $module = DB::table('modules')
        ->select('modules.*')
        ->join('courses', 'modules.course_id', '=', 'courses.id')
        ->join('teachers', 'teachers.id', '=', 'modules.theachers_id')
        ->join('users', 'users.id', '=', 'teachers.user_id')
        ->where('courses.id', '=', $id)
        ->get();

        $course = Courses::where('id', $id)->select('id')->get();

        return view('dashboard-siswa.moduletugassiswa', ["course" => $course, "nama" => $nis, "mods" => $module]);
    }
}
