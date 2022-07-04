<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Kelas;
use App\Models\mapel;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $mapel = mapel::all();
        $teacher = Teachers::all();
        $kelas = Kelas::all();

        $course = DB::table('courses')
        ->join('mapels', 'mapels.id', '=', 'courses.mapel')
        ->join('teachers', 'teachers.id', '=', 'courses.pengajar')
        ->join('kelas', 'kelas.id', '=', 'courses.kelas')
        ->select('courses.*', 'mapels.nama_mapel','courses.deskripsi', 'kelas.nama_kelas', 'kelas.tahun_ajaran', 'teachers.name')
        ->orderBy('mapels.nama_mapel', 'ASC')
        ->get();

        return view('dashboard-admin.course', ["mapel" => $mapel, "guru" => $teacher, "kelas" => $kelas, "courses"=> $course]);
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            'mapel' => 'required|string',
            'kelas' => 'required|string',
            'pengajar' => 'required|string',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:20000',
            'deskripsi' => 'required|string',
        ]);

        $fileName = '';
        if ($file = $request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/thumbnail';
            $file->move($destinationPath, $fileName);
        }
        Courses::create([
            'mapel' =>$fields['mapel'],
            'kelas' =>$fields['kelas'],
            'pengajar' =>$fields['pengajar'],
            'thumbnail' =>$fileName,
            'deskripsi' =>$fields['deskripsi'],
        ]);

        return back()->with('success', 'berhasil menambahkan course!');
    }
    public function update(Request $request, $id){
        $course = Courses::find($id);
        $course->mapel = $request->mapel;

        $fileName = '';
        if ($file = $request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/thumbnail';
            $file->move($destinationPath, $fileName);
            $course->thumbnail = $fileName;
        }

        $course->kelas = $request->kelas;
        $course->mapel = $request->mapel;
        $course->deskripsi = $request->deskripsi;
        $course->pengajar = $request->pengajar;
        $course->save();

        return back()->with('success', 'Berhasil update');
    }
    public function delete($id){
        Courses::where('id', $id)->delete();
        return back()->with('success', 'Berhasil Dihapus');
    }

}
