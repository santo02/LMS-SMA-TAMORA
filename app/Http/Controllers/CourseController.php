<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $course = DB::table('courses')->get();

        return view('dashboard-siswa.course', ['courses' => $course]);
    }
}
