<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Students;
use Illuminate\Http\Request;

class DetailKelasController extends Controller
{
    public function index($id){
        $kelas = Kelas::where('id', $id)->get();
        return view('dashboard-admin.DetailKelas', ["kelas" => $kelas]);
    }

    public function findNama(Request $request){
        $query = $request->get('query');
        $data = Students::where("NIS", "LIKE",'%'.$query.'%')
        ->get();

        return response()->json($data);
    }
    public function store(Request $request){
        $fields = $request->validate([
            'nis' => 'required|string'
        ]);
        Students::where('nis', $fields['nis'])->get();

    }
}
