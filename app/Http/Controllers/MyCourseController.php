<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\MyCourse;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MyCourseController extends Controller
{
    public function index()
    {
        $users_id = Auth::User()->id;
        $Students_id = Teachers::where('user_id', $users_id)->first()->id;
        $course = DB::table('courses')->where('theachers_id', $Students_id)->get();

        return view('dashboard-guru.mycourse', ['courses' => $course]);
    }
    public function store(Request $request)
    {

        $fields = $request->validate([
            'title' => 'required|string|max:20',
            'thumbnail' => 'required',
            'thumbnail.*' => 'image|mimes:jpg,jpeg,png|max:20000',
            'jurusan' => 'required|string',
            'minggu' => 'required|string',
            'desk' => 'required|string',
            'key' => 'string'
        ]);
        $users_id = Auth::User()->id;
        $theachers_id = Teachers::where('user_id', $users_id)->first()->id;
        $fileName = '';
        if ($file = $request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/thumbnail';
            $file->move($destinationPath, $fileName);
        }

        // $thumbnail = $request->file('thumbnail')->store('public/thumbnail');
        Courses::create([
            'title' => $fields['title'],
            'thumbnail' => $fileName,
            'jurusan' => $fields['jurusan'],
            'deskripsi' => $fields['desk'],
            'minggu' => $fields['minggu'],

            'enroll_key' => $fields['key'],
            'theachers_id' => $theachers_id
        ]);

        return redirect()->route('mycourse')->with('succes', 'Berhasil menambahkan course');
    }
    public function delete($id)
    {
        MyCourse::where('course_id', $id)->delete();
        Courses::destroy($id);
        return redirect()->route('mycourse')->with('success', 'Berhasil Dihapus');
    }

    public function update(Request $request)
    {
        $id = $request->id_course;
        $course = Courses::find($id);
        $course->title = $request->title;

        $fileName = '';
        if ($file = $request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/thumbnail';
            $file->move($destinationPath, $fileName);
            $course->thumbnail = $fileName;
        }

        $course->minggu = $request->minggu;
        $course->jurusan = $request->jurusan;
        $course->deskripsi = $request->desk;
        $course->enroll_key = $request->key;
        $course->save();
        return redirect()->route('mycourse')->with('success', 'Berhasil update');
    }
}
