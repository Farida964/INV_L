<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    // ================= REGISTER =================
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // 📧 Email notifikasi registrasi
        Mail::raw(
            "Halo {$user->name},\n\nAkun inventory kamu berhasil dibuat.\n\nTerima kasih.",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Registrasi Berhasil - Inventory');
            }
        );

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // ================= LOGIN =================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // 📧 Email notifikasi login
            Mail::raw(
                "Halo {$user->name},\n\nLogin berhasil pada:\n" . now(),
                function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Login Berhasil - Inventory');
                }
            );

            return redirect('/inventory');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // ================= LOGOUT =================
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
