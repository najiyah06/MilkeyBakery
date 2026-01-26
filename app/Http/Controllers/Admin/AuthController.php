<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // tampilkan halaman login admin
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    // proses login admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                return back()->with('error', 'Akses khusus admin!');
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // logout admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}