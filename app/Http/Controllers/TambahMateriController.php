<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TambahMateriController extends Controller
{
    public function index($id){


        return view('dashboard-guru.Tambahmateri', ['id' => $id]);

    }
    public function show($id){
        $module = DB::table('modules')
        ->join('courses', 'modules.course_id', '=', 'courses.id')
        ->join('teachers', 'teachers.id', '=', 'modules.theachers_id')
        ->join('users', 'users.id', '=', 'teachers.user_id')
        ->select('modules.*', 'users.name')
        ->get();

        return view('dashboard-guru.materi', ["module" => $module]);

    }
    public function store(Request $request, $id){
        $fields = $request->validate([
            'topic' => 'required|string',
            'content' => 'required|string',
            'week' => 'required|string',
            'sesion' => 'required|string',
            'sesison_date' => 'required|date|date_format:Y-m-d',
            'file' => 'required',
            'file.*' => 'image|mimes:jpg,jpeg,png,docx,pdf,pptx|max:2000'
        ]);
        $users_id = Auth::User()->id;
        $theachers_id = Teachers::where('user_id', $users_id)->first()->id;
        $course_id = $id;

        $fileName = '';
        if ($file = $request->hasFile('materi')) {

            $file = $request->file('materi');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/materi';
            $file->move($destinationPath, $fileName);
        }

            Modules::create([
                'course_id' => $course_id,
                'topic' => $fields['topic'],
                'content' => $fields['content'],
                'week' => $fields['week'],
                'sesion' => $fields['sesion'],
                'sesison_date' => $fields['sesison_date'],
                'jenis' => 'materi',
                'theachers_id' => $theachers_id,
                'file' => $fileName
            ]);
            return ('berhasil');
    }
}
