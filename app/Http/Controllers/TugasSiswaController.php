<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TugasSiswaController extends Controller
{
    public function show($id)
    {
        $tugas =  DB::table('tugas')
            ->join('courses', 'tugas.id_course', '=', 'courses.id')
            ->join('teachers', 'courses.pengajar', '=', 'teachers.id',)
            ->where('tugas.id', $id)
            ->select('teachers.name', 'teachers.nip', 'tugas.*')
            ->get();

        $subs_id = DB::table('submissions')
            ->where('id_tugas', $id)
            ->select('submissions.*')
            ->get();
        $id_user = Auth::user()->id;
        $id_st = DB::table('students')->where('user_id', $id_user)->select('id')->get();
        $for_id = DB::table('submissions')
            ->join('forum_submissions', 'submissions.id', '=',  'forum_submissions.id_subm')
            ->where('id_tugas', $id)
            ->where('forum_submissions.id_siswa', $id_st[0]->id)
            ->select('forum_submissions.*')
            ->get();


        // $submision = DB::table('forum_submissions')
        // ->join('submissions', 'forum_submissions.id_subm', '=', 'submissions.id')
        // ->join('tugas', 'submissions.id_tugas', '=', 'tugas.id')
        // ->join('students', 'forum_submissions.id_siswa', '=', 'students.id')
        // ->where('tugas.id', $id)
        // ->select('forum_submissions.*', 'forum_submissions.file', 'students.name' , 'students.nis',)
        // ->get();
        // return $submision;


        $user = Auth::user()->id;
        $id_siswa = DB::table('students')->where('user_id', $user)->get('id');
        $ms = DB::table('forum_submissions')
            ->join('submissions', 'forum_submissions.id_subm', '=', 'submissions.id')
            ->join('tugas', 'submissions.id_tugas', '=', 'tugas.id')
            ->join('courses', 'tugas.id_course', '=', 'courses.id')
            ->join('kelas', 'courses.kelas', '=', 'kelas.id')
            ->join('kelas_siswas', 'kelas.id', '=', 'kelas_siswas.kelas_id')
            ->join('students', 'kelas_siswas.students_id', '=', 'students.id')
            ->where('tugas.id', $id)
            ->where('students.id', $id_siswa[0]->id)
            ->where('forum_submissions.id_siswa', $id_st[0]->id)
            ->select('forum_submissions.*', 'forum_submissions.file', 'students.name', 'students.nis')
            ->get();

            // return $id_st;


        return view('dashboard-siswa.DetailTugassiswa', ["tugas" => $tugas, "mysub" => $ms, "sub_id" => $subs_id, "for_id" => $for_id]);
    }
}
