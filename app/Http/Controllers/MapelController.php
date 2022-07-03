<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = mapel::all();
        return view('dashboard-admin.mapel', ['mapel' => $mapel]);
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            'mapel' => 'required|string'
        ]);
        mapel::create([
            'nama_mapel' => $fields['mapel']
        ]);

        return back()->with('success', 'Berhasil Menambahkan');
    }
    public function edit(Request $request, $id)
    {
        $fields = $request->validate([
            'mapels' => 'required|string'
        ]);
        $mapel = mapel::find($id);
        $mapel->nama_mapel = $request->mapels;
        $mapel->save();

        return back()->with('success', 'Berhasil di update');
    }
}
