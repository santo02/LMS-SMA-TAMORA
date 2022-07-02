<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\MyCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SelfenrollController extends Controller
{
    public function index($id){
    $course = DB::table('courses')->where('id', $id)->select('courses.*')->get();

        return view('dashboard-siswa.selfenrollment', ["courses"=> $course]);
    }
    public function enroll(Request $request, $id){
        $fields = $request->validate([
            'key-enroll' => 'required|string',
        ]);

        $course = DB::table('courses')->where('id', $id)->select('courses.enroll_key')->get();
    //    return $course[0]->enroll_key;
        $student_id = Auth::user()->id;

        if ( $fields['key-enroll'] == $course[0]->enroll_key ) {
            MyCourse::create([
                'student_id' => $student_id,
                'course_id' => $id]);
            return back()->with('success', 'Berhasil ditambahkan');
        }
        else{
            return back()->with('gagal', 'Gagal Menambahkan!');
        }

    }
}
