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
            MyCourse::firstOrCreate([
                'student_id' => $students->id,
                'course_id' => $idc]);

            return back()->with('success', 'Berhasil ditambahkan');
        }
        else{
            return back()->with('gagal', 'Gagal Menambahkan!');
        }

    }

    public function reset($id){
        $data = MyCourse::where('course_id', '=', $id);
        if (is_null($data)) {
            return back()->with('gagal_reset', 'Gagal Direset');
        }
        MyCourse::where('course_id', '=', $id)->delete();
        return back()->with('reset', 'Berhasil Direset');
    }
}
