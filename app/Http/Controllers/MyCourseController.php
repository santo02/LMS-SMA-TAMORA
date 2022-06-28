<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MyCourseController extends Controller
{
    public function index(){
        $users_id = Auth::User()->id;
        $Students_id = Teachers::where('user_id', $users_id)->first()->id;
        $course = DB::table('courses')->where('theachers_id', $Students_id)->get();

        return view('dashboard-guru.mycourse', ['courses'=> $course]);
    }
    public function store(Request $request){

        $fields = $request->validate([
            'title' => 'required|string|max:20',
            'thumbnail' => 'required',
            'thumbnail.*' => 'image|mimes:jpg,jpeg,png|max:20000',
            'jurusan' => 'required|string',
            'desk' => 'required|string',
            'key' => 'string'
        ]);
        $users_id = Auth::User()->id;
        $theachers_id = Teachers::where('user_id', $users_id)->first()->id;

            $thumbnail = $request->file('thumbnail')->store('public/thumbnail');
            Courses::create([
                'title' => $fields['title'],
                'thumbnail' => $thumbnail,
                'jurusan' => $fields['jurusan'],
                'deskripsi' => $fields['desk'],
                'enroll_key' => $fields['key'],
                'theachers_id' => $theachers_id
            ]);

            return redirect()->route('mycourse')->with('succes', 'Berhasil menambahkan course');
    }
    public function delete($id){
        Courses::destroy($id);
        return redirect()->route('mycourse')->with('success', 'Berhasil Dihapus');
    }

    public function update(Request $request, $id){

        $course = Courses::find($id);

        $course->title = $request->title;
        $course->thumbnail = $request->thumbnail;
        $course->jurusan = $request->jurusan;
        $course->deskripsi = $request->deskripsi;
        $course->enroll_key = $request->enroll_key;

        $course->save();

        return('test');
        // return redirect()->route('mycourse')->with('success','updated Berhasil');

    }
}
