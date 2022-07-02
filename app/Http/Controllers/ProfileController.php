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
    if($role[0]->role == 'teacher'){
        $user =   DB::table('users')->join('teachers', 'teachers.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('users.id', 'users.name', 'users.email', 'users.password', 'teachers.nip', 'teachers.phone', 'teachers.address')
            ->get();
    }
    elseif($role[0]->role == 'student'){
        $user =   DB::table('users')->join('students', 'students.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('users.id', 'users.name', 'users.email', 'users.password', 'students.nis', 'students.phone', 'students.address')
            ->get();
    }



        return view('editprofile', ["users" => $user, "role" => $role[0]]);
    }

    public function update(Request $request, $id)
    {
        $role = Auth::user()->role;

        $user = User::where('id',$id)->first();
        $students = Students::where('user_id', $id)->first();
        $teachers = Teachers::where('user_id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        // $data = $request->except('_method','_token','submit');

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->Back()->withInput()->withErrors($validator);
        // }

        // $user = User::find($id);
        if($role == 'student'){

            $students->NIS = $request->NIS;
            $students->phone = $request->phone;
            $students->address = $request->address;

            if($user->save() && $students->save()){

                Session::flash('message', 'Sukses Update Data!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('profile');
            }else{
                Session::flash('message', 'Gagal Update Data!');
                Session::flash('alert-class', 'alert-danger');
            }
        } elseif($role=='teacher'){

            $teachers->NIP = $request->NIP;
            $teachers->phone = $request->phone;
            $teachers->address = $request->address;

            if($user->save() && $teachers->save()){

                Session::flash('message', 'Sukses Update Data!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('profile');
            }else{
                Session::flash('message', 'Gagal Update Data!');
                Session::flash('alert-class', 'alert-danger');
            }
        }

        return Back()->withInput();
    }

    public function updatePassword(Request $request, $id){
        $user = User::where('id',$id)->first();

        $user->password = bcrypt($request->password);

        if($request->password == $request->repassword){
            if($user->save()){

                Session::flash('message2', 'Sukses Update Data!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('profile');
            }
        }else{
            Session::flash('message2', 'Password dan Re-Entry Password Tidak Sesuai!');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }
}
