<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\User;
use App\Models\Teachers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $role = DB::table('users')->where('id', $id)->select('role')->get();
        if ($role[0]->role == 'teacher') {
            $user =   DB::table('users')->join('teachers', 'teachers.user_id', '=', 'users.id')
                ->where('users.id', $id)
                ->select('users.id', 'users.email', 'users.password', 'teachers.*', 'teachers.phone', 'teachers.address', 'teachers.nip')
                ->get();
        } elseif ($role[0]->role == 'student') {
            $user =   DB::table('users')->join('students', 'students.user_id', '=', 'users.id')
                ->where('users.id', $id)
                ->select('users.id', 'users.email', 'users.password', 'students.*', 'students.phone', 'students.address', '.nis')
                ->get();
        }
        return view('editprofile', ["users" => $user, "role" => $role[0]]);
    }

    public function update(Request $request, $id)
    {
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        $students = Students::where('id', $id)->first();
        $teachers = Teachers::where('id', $id)->first();
        // $students = Students::find($st_id);
        // $teachers = Teachers::find($tc_id);

        $user->email = $request->email;

        if ($role == 'student') {
            // return($students);
            $students->phone = $request->phone;
            $students->NIS = $request->NIS;

            $students->name = $request->name;
            $students->gender = $request->gender;
            $students->birth_date = $request->birth_date;
            $students->address = $request->address;

            if ($user->save() && $students->save()) {

                Session::flash('message', 'Sukses Update Data!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('profile');
            } else {
                Session::flash('message', 'Gagal Update Data!');
                Session::flash('alert-class', 'alert-danger');
            }
        } elseif ($role == 'teacher') {

            $teachers->NIP = $request->NIP;
            $teachers->phone = $request->phone;
            $teachers->name = $request->name;
            $teachers->gender = $request->gender;
            $teachers->birth_date = $request->birth_date;
            $teachers->address = $request->address;

            if ($user->save() && $teachers->save()) {

                Session::flash('message', 'Sukses Update Data!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('profile');
            } else {
                Session::flash('message', 'Gagal Update Data!');
                Session::flash('alert-class', 'alert-danger');
            }
        }

        return Back()->withInput();
    }

    public function updatePassword(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $user = User::where('id', $user_id)->first();

        // return $user_id;
        $user->password = bcrypt($request->password);

        if ($request->password == $request->repassword) {
            if ($user->save()) {

                Session::flash('message2', 'Sukses Update Data!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('profile');
            }
        } else {
            Session::flash('message2', 'Password dan Re-Entry Password Tidak Sesuai!');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }
    public function editgambar(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == 'teacher') {
            $profile = Teachers::find($id);
            $field = $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png|max:20000',
            ]);
            $fileName = '';
            if ($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/Fotoprofile';
                $file->move($destinationPath, $fileName);

                $profile->foto = $fileName;

            }
            $profile->save();
                return back()->with('success', 'Berhasil update');
        } elseif ($role == 'student') {
            $students = Students::find($id);
            $field = $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png|max:20000',
            ]);
            $fileName = '';
            if ($file = $request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/Fotoprofile';
                $file->move($destinationPath, $fileName);
                $students->foto = $fileName;
            }
            $students->save();
            return back()->with('success', 'Berhasil update');
        }
    }
}
