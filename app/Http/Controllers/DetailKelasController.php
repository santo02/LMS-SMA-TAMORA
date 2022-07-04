<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailKelasController extends Controller
{
    public function index($id){
        $kelas = Kelas::where('id', $id)->get();

       $siswa_kelas =  DB::table('kelas_siswas')
        ->join('kelas', 'kelas.id', '=', 'kelas_siswas.kelas_id')
        ->join('students', 'students.id', '=', 'kelas_siswas.students_id')
        ->where('kelas_siswas.kelas_id', $id)
        ->select('students.*', 'kelas_siswas.id')
        ->get();
        return view('dashboard-admin.DetailKelas', ["kelas" => $kelas, "siswa" => $siswa_kelas]);
    }

    public function findNama(Request $request){
        $query = $request->get('query');
        $data = Students::where("NIS", "LIKE",'%'.$query.'%')
        ->get();

        return response()->json($data);
    }
    public function store(Request $request, ){
        $fields = $request->validate([
            'nis' => 'required|string'
        ]);
        $ids = Students::where('nis', $fields['nis'])->select('id')->get();
        $id_stu = $ids[0]->id;

        KelasSiswa::create([
            'students_id' => $id_stu,
            'kelas_id' => $request->id_kelas,
        ]);

        return back()->with('success', 'berhasil menambahkan');
    }
    public function delete($id){
        KelasSiswa::where('id', $id)->delete();
        return back()->with('success', 'berhasil menghapus!');
    }
}
