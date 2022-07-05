<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Modules;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function index($id)
    {
        return view('dashboard-guru.Tambahmateri', compact('id'));
    }

    public function show($id)
    {
        $materi =  DB::table('materis')
            ->join('courses', 'materis.id_course', '=', 'courses.id')
            ->join('teachers', 'courses.pengajar', '=', 'teachers.id',)
            ->where('materis.id', $id)
            ->select('teachers.name', 'teachers.nip', 'materis.*')
            ->get();
        return view('dashboard-guru.DetailMateriguru', ["materi" => $materi]);
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
            $destinationPath = public_path() . '/materi';
            $file->move($destinationPath, $fileName);


            Materi::create([
                'id_course' => $request->id_course,
                'topik' => $fields['topik'],
                'bab' => $fields['bab'],
                'T_mulai' => $fields['T_mulai'],
                'T_akhir' => $fields['T_akhir'],
                'Deskripsi' => $fields['deskripsi'],
                'file' => $fileName,
                'lampiran' => $request->lampiran,
            ]);
            return back()->with('success', 'Berhasil Ditambahkan!');
        }
        return back()->with('gagal', 'Gagal Ditambahkan!');
    }
    public function showUpdate($id)
    {
        $materi =  DB::table('materis')
            ->join('courses', 'materis.id_course', '=', 'courses.id')
            ->join('teachers', 'courses.pengajar', '=', 'teachers.id',)
            ->where('materis.id', $id)
            ->select('teachers.name', 'teachers.nip', 'materis.*')
            ->get();

        return view('dashboard-guru.EditMateriguru', ["materi" => $materi]);
    }

    public function Delete($id)
    {
        DB::table('materis')->where('id', $id)->delete();
        // DB::table('modules')->where('module_id', $id)->delete();
        return back()->with('success', 'Berhasil Dihapus!');
    }

    public function edit(Request $request, $id)
    {
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
            $materi = Materi::find($id);
            $materi->id = $id;
            $materi->id_course = $request->id_course;
            $materi->topik = $fields['topik'];
            $materi->bab = $fields['bab'];
            $materi->T_mulai = $fields['T_mulai'];
            $materi->T_akhir = $fields['T_akhir'];
            $materi->Deskripsi = $fields['deskripsi'];
            $materi->file = $fileName;
            $materi->lampiran = $request->lampiran;
            $materi->save();
            return back()->with('success', 'Berhasil Diedit!');
        }
        return back()->with('gagal', 'Gagal Diedit!');
    }

    public function download($id)
    {
        $materi = DB::table('materis')->where('id', $id)->select('materis.file')->get();
        $myFile = public_path('materi/' . $materi[0]->file);
        return response()->download($myFile);
    }
}
