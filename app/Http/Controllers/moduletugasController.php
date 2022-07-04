<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\MyCourse;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class moduletugasController extends Controller
{

    public function index($id)
    {
        // $nis = DB::table('courses')
        //     ->join('my_courses', 'courses.id', '=', 'my_courses.course_id')
        //     ->join('students', 'students.id', '=', 'my_courses.student_id')
        //     ->join('users', 'users.id', '=', 'students.user_id')
        //     ->where('courses.id', '=', $id)
        //     ->select('students.NIS', 'users.name')
        //     ->get();


        // $module = DB::table('modules')
        // ->select('modules.*')
        // ->join('courses', 'modules.course_id', '=', 'courses.id')
        // ->join('teachers', 'teachers.id', '=', 'modules.theachers_id')
        // ->join('users', 'users.id', '=', 'teachers.user_id')
        // ->where('courses.id', '=', $id)
        // // ->select('modules.*', 'users.name')
        // // ->groupBy('modules.week')
        // ->get();

        $course = Courses::where('id', $id)->select('id')->get();
        return view('dashboard-guru.moduletugas', ["course" => $course]);
    }
    public function reset()
    {
    }
}
