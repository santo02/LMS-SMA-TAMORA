<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriSiswaController extends Controller
{

    public function show($id)
    {
        $materi =  DB::table('materis')
            ->join('courses', 'materis.id_course', '=', 'courses.id')
            ->join('teachers', 'courses.pengajar', '=', 'teachers.id',)
            ->where('materis.id', $id)
            ->select('teachers.name', 'teachers.nip', 'materis.*')
            ->get();
        return view('dashboard-siswa.DetailMaterisiswa', ["materi" => $materi]);
    }

}
