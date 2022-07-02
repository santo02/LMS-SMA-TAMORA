<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
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

        if(Auth::attempt($credentials)){
            if(auth()->user()->status == 'aktif'){
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
            else{
                return redirect()->route('login')->with('nonaktif', 'Login tidak berhasil!');
            }
        }

        return redirect()->route('login')->with('nonaktif', 'Login tidak berhasil!');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
