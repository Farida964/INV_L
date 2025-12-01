<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
{
    return view('auth.register');
}

// proses regis

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    return redirect('/login')->with('success', 'Berhasil daftar, silakan login.');
}

    // Proses login
   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect('/inventory');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}

    // Logout
   public function logout()
{
    Auth::logout();
    return redirect('/login');
}

}
