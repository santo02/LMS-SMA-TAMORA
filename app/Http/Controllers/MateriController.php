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
    public function index($id){

        return view('dashboard-guru.Tambahmateri', compact('id'));
    }

    // public function show($id, $week){
    //     $module = DB::table('modules')
    //     ->join('courses', 'modules.course_id', '=', 'courses.id')
    //     ->join('teachers', 'teachers.id', '=', 'modules.theachers_id')
    //     ->join('users', 'users.id', '=', 'teachers.user_id')
    //     ->where('courses.id', '=', $id)
    //     ->where('modules.week', '=', $week)
    //     ->select('modules.*', 'users.name')
    //     ->get();

    //     return view('dashboard-guru.materi', ["module" => $module]);

    // }
    public function store(Request $request){
        $fields = $request->validate([
            'topik' => 'required|string',
            'bab' => 'required|string',
            'T_mulai' => 'required|date',
            'T_akhir' => 'required|date',
            'deskripsi' => 'required|string',
            'file' => 'required',
            'file.*' => 'mimes:pdf,docx,doc,zip,jpg,png,jpeg'|'max:2048',
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

    public function Delete($id){

        DB::table('modules')->where('module_id', $id)->delete();

        return back()->with('success', 'Berhasil Dihapus!');
    }
}
