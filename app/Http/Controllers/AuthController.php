<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('username', 'password');

            Auth::attempt($credentials);
            $user = Auth::user();

            switch ($user->role) {
                case 'pasien':
                    return redirect()->route('pasien.dashboard');
                case 'dokter':
                    return redirect()->route('dokter.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                default:
                    Auth::logout();
            }

            return redirect()->route('login')->with('error', 'Login gagal. Silahkan coba lagi.')->withInput();
        } catch (\Throwable $th) {
            return redirect()->route('login')->with(['error' => $th->getMessage()]);
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        try {
            $request->validate([
                'username' => 'required|unique:users',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]);

            User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silahkan login.');
        } catch (\Throwable $e) {
            return back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    // public function register()
    // {
    //     return view('auth.register');
    // }

    // Handle the login process
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();

    //         // Redirect based on user role
    //         switch ($user->role) {
    //             case 'pasien':
    //                 return redirect()->route('pasien.dashboard');
    //             case 'dokter':
    //                 return redirect()->route('dokter.dashboard');
    //             default:
    //                 Auth::logout();
    //                 return redirect()->route('login')->with('error', 'role tidak ditemukan.');
    //         }
    //     }

    //     return back()->with('error', 'Username atau password salah.');
    // }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
