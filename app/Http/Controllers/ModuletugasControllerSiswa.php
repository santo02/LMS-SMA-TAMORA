<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuletugasControllerSiswa extends Controller
{
    public function index($id)
    {
        $siswa = DB::table('courses')->join('kelas', 'courses.kelas', '=', 'Kelas.id')
        ->join('kelas_siswas', 'kelas_siswas.kelas_id', '=', 'kelas.id')
        ->join('students', 'students.id', '=', 'kelas_siswas.students_id')
        ->where('courses.id', $id)
        ->select('students.NIS', 'students.name')
        ->get();


        $materi = Materi::where('id_course', $id)->select('materis.*')
        ->orderBy('bab', 'ASC')
        ->get();

        $tugas = Tugas::where('id_course', $id)->select('tugas.*')
        ->orderBy('bab', 'ASC')
        ->get();

        $course = DB::table('courses')
        ->join('mapels', 'courses.mapel', '=', 'mapels.id')
        ->where('courses.id', $id)
        ->select('mapels.nama_mapel', 'courses.id')
        ->get();

        return view('dashboard-siswa.Siswamoduletugas', ["course" => $course, 'materi'=> $materi,"siswa" => $siswa, "tugas" => $tugas]);
    }
}
