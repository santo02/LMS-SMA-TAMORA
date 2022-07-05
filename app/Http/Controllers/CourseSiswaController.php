<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class CourseSiswaController extends Controller
{
    public function index()
    {
        $users_id = Auth::User()->id;
        $siswa = Students::where('user_id', $users_id)->first()->id;

        $course = DB::table('courses')
        ->join('mapels', 'mapels.id', '=', 'courses.mapel')
        ->join('teachers', 'teachers.id', '=', 'courses.pengajar')
        ->join('kelas', 'kelas.id', '=', 'courses.kelas')
        ->join('kelas_siswas', 'kelas_siswas.kelas_id', '=', 'kelas.id')
        ->join('students', 'students.id' , '=', 'kelas_siswas.students_id')
        ->where('kelas_siswas.students_id', '=',  $siswa)
        ->select('courses.*', 'mapels.nama_mapel','courses.deskripsi', 'kelas.nama_kelas', 'kelas.tahun_ajaran', 'teachers.name')
        ->get();

        return view('dashboard-siswa.course', ['courses' => $course]);
    }
}
