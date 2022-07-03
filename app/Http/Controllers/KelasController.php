<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('dashboard-admin.kelas', ["kelas" => $kelas]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'nama_kelas' => 'required|string',
            'tahun_ajaran' => 'required|string',
        ]);

        Kelas::create([
            'nama_kelas' => $fields['nama_kelas'],
            'tahun_ajaran' => $fields['tahun_ajaran'],
        ]);
        return back()->with('success', 'Berhasil Menambahkan!');
    }
    public function edit(Request $request, $id){
        $request->validate([
            'nama_kelas' => 'required|string',
            'tahun_ajaran' => 'required|string',
        ]);
        $mapel = Kelas::find($id);
        $mapel->nama_kelas = $request->nama_kelas;
        $mapel->tahun_ajaran = $request->tahun_ajaran;
        $mapel->save();
        return back()->with('success', 'Berhasil Mengedit!');
    }
    public function destroy($id){
        Kelas::where('id', $id)->delete();
        return back()->with('success', 'Berhasil Menghapus!');
    }
}
