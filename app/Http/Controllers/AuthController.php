<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{ 
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials =  $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (!Auth::attempt($credentials)){
            return back()->withErrors('email', 'Email atau password salah');
        }

        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function showRegister() {
        return \view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return \redirect('/login')->with('success', 'berhasil mendaftar silahkan login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return \redirect('/login');
    }
}
