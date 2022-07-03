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
        $data = Students::select('NIS')
        ->where("NIS","LIKE","%{$request->query}%")
        ->get();

        return response()->json($data);

    }
}
