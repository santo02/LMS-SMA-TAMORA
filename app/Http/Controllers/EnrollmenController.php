<?php

namespace App\Http\Controllers;

use App\Models\MyCourse;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmenController extends Controller
{
    public function store(Request $request){
        $fields = $request->validate([
            'NIS' => 'required|string',
            'name' => 'required|string',
        ]);

        $students = Students::where('NIS',  $fields['NIS'])->first();
        $students_name = User::where('name', $fields['name'])->first();
        $idc = $request->id_course;
        // dd($idc);

        if ($students && ($fields['name'] == $students_name->name)) {
            MyCourse::create([
                'student_id' => $students->id,
                'course_id' => $idc]);
            return back()->with('success', 'Berhasil ditambahkan');
        }

    }
}