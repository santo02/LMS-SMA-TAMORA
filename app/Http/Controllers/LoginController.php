<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->Login = new Login();
    }

    public function index()
    {
        return view('login.login');
    }

    public function authentikasi(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $data = $request->email;
        $cek_email = DB::table('users')->where('email', $data)->select('status')->get();
        // return $cek_email ;
        if (count($cek_email) == 0) {
            return back()->with('nonaktif', 'email tidak terdaftar!');
        } else {
            if ($cek_email[0]->status == 'aktif') {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard');
                }
                return back()->with('nonaktif', 'Login tidak berhasil!');
            } else {
                return back()->with('nonaktif', 'akun tidak aktif!');
            }
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
