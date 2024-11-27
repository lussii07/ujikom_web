<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // View untuk form login
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Coba autentikasi dengan username dan password
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Redirect ke dashboard setelah login berhasil
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil');
        }
    
        // Jika login gagal
        return redirect()->back()->with('error', 'Username atau password salah')->withInput();
    }
    

    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        return redirect()->route('login.form')
            ->with('success', 'Logout berhasil');
    }
}