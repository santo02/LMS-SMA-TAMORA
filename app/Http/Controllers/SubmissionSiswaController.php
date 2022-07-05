<?php

namespace App\Http\Controllers;

use App\Models\forumSubmission;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubmissionSiswaController extends Controller
{
    public function add(Request $request)
    {
        $fields = $request->validate([
            'file' => 'required',
            'file.*' => 'mimes:pdf,docx,doc,zip,jpg,png,jpeg' | 'max:2048',
        ]);
        $user_id = Auth::user()->id;
        $students_id = Students::where('user_id', $user_id)->select('id')->get();
         if ($file = $request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/submission';
            $file->move($destinationPath, $fileName);
        }
        forumSubmission::create([
            'id_siswa' => $students_id[0]->id,
            'id_subm' => $request->id_s,
            'file' => $fileName,
            'nilai' => "-",
        ]);
        return back()->with('success', 'Berhasil menambahkan submissions!');
    }

    public function download($id)
    {
        $submissions = DB::table('forum_submissions')->where('id', $id)->select('forum_submissions.file')->get();
        $myFile = public_path('submission/'.$submissions[0]->file);
        return response()->download($myFile);
    }
    public function delete($id){
        forumSubmission::where('id', $id)->delete();
        return back()->with('success', 'Berhasil menghapus submissions!');
    }
}
