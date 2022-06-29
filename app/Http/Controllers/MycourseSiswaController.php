<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MycourseSiswaController extends Controller
{
    public function index()
    {
        $users_id = Auth::User()->id;
        $Students_id = Students::where('user_id', $users_id)->first()->id;

       $course =  DB::table('my_courses')->join('courses', 'courses.id', '=', 'my_courses.course_id')
        ->join('students', 'students.id', '=', 'my_courses.student_id')
        ->where('students.id', '=', $Students_id)
        ->select('courses.*')
        ->get();

        return view('dashboard-siswa.mycoursesiswa', ['courses' => $course]);
    }
}
