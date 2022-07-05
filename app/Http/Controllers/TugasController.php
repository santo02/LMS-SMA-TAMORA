<?php

namespace App\Http\Controllers;

use App\Models\forumSubmissin;
use App\Models\forumSubmission;
use App\Models\Submission;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index($id){
        return view('dashboard-guru.Tambahtugas', compact('id'));
    }

    public function show($id)
    {
        $tugas =  DB::table('tugas')
            ->join('courses', 'tugas.id_course', '=', 'courses.id')
            ->join('teachers', 'courses.pengajar', '=', 'teachers.id',)
            ->where('tugas.id', $id)
            ->select('teachers.name', 'teachers.nip', 'tugas.*')
            ->get();

            $submision = DB::table('forum_submissions')
            ->join('submissions', 'forum_submissions.id_subm', '=', 'submissions.id')
            ->join('tugas', 'submissions.id_tugas', '=', 'tugas.id')
            ->join('students', 'forum_submissions.id_siswa', '=', 'students.id')
            ->where('tugas.id', $id)
            ->select('forum_submissions.*', 'forum_submissions.file', 'students.name' , 'students.nis',)
            ->get();
            // return $submision;
        return view('dashboard-guru.DetailTugasguru', ["tugas" => $tugas, "subs" => $submision]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'topik' => 'required|string',
            'bab' => 'required|string',
            'T_mulai' => 'required|date',
            'T_akhir' => 'required|date',
            'deskripsi' => 'required|string',
            'file' => 'required',
            'file.*' => 'mimes:pdf,docx,doc,zip,jpg,png,jpeg' | 'max:2048',
        ]);

        $fileName = '';
        if ($file = $request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/Tugas';
            $file->move($destinationPath, $fileName);
            Tugas::create([
                'id_course' => $request->id_course,
                'topik' => $fields['topik'],
                'bab' => $fields['bab'],
                'T_mulai' => $fields['T_mulai'],
                'T_akhir' => $fields['T_akhir'],
                'Deskripsi' => $fields['deskripsi'],
                'file' => $fileName,
                'lampiran' => $request->lampiran,
            ]);
            $id_t = DB::table('tugas')->orderBy('id', 'DESC')->limit(1)->get();
            foreach ($id_t as $i) {
                $id_tugas = $i->id;
            }
            Submission::create([
                'id_tugas' => $id_tugas
            ]);


            return back()->with('success', 'Berhasil Ditambahkan!');
        }
        return back()->with('gagal', 'Gagal Ditambahkan!');
    }
    public function showUpdate($id)
    {
        $materi =  DB::table('tugas')
            ->join('courses', 'tugas.id_course', '=', 'courses.id')
            ->join('teachers', 'courses.pengajar', '=', 'teachers.id',)
            ->where('tugas.id', $id)
            ->select('teachers.name', 'teachers.nip', 'tugas.*')
            ->get();

        return view('dashboard-guru.EditTugasguru', ["materi" => $materi]);
    }
    public function edit(Request $request, $id){
        $fields = $request->validate([
            'topik' => 'required|string',
            'bab' => 'required|string',
            'T_mulai' => 'required|date',
            'T_akhir' => 'required|date',
            'deskripsi' => 'required|string',
            'file.*' => 'mimes:pdf,docx,doc,zip,jpg,png,jpeg' | 'max:2048',
        ]);

        $fileName = '';
        if ($file = $request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/materi';
            $file->move($destinationPath, $fileName);
            $tugas = Tugas::find($id);
            $tugas->id = $id;
            $tugas->id_course = $request->id_course;
            $tugas->topik = $fields['topik'];
            $tugas->bab = $fields['bab'];
            $tugas->T_mulai = $fields['T_mulai'];
            $tugas->T_akhir = $fields['T_akhir'];
            $tugas->Deskripsi = $fields['deskripsi'];
            $tugas->file = $fileName;
            $tugas->lampiran = $request->lampiran;
            $tugas->save();
            return back()->with('success', 'Berhasil Diedit!');
        }
        return back()->with('gagal', 'Gagal Diedit!');
    }

    public function Delete($id)
    {
        DB::table('tugas')->where('id', $id)->delete();
        // DB::table('modules')->where('module_id', $id)->delete();
        return back()->with('success', 'Berhasil Dihapus!');
    }
    public function nilai(Request $request){
        $nb = $request->nilai;
        $id_sub =$request->id_sub;

        $sub = forumSubmission::find($id_sub);
        $sub->nilai = $nb;
        $sub->save();
        return back()->with('success', 'Berhasil Menilai!');
    }
    public function download($id)
    {
        $materi = DB::table('tugas')->where('id', $id)->select('tugas.file')->get();
        $myFile = public_path('Tugas/' . $materi[0]->file);
        return response()->download($myFile);
    }

}
