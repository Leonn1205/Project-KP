<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->role) {
                case 'Super Admin':
                    return redirect()->route('dashboard.superadmin');
                case 'Admin':
                    return redirect()->route('dashboard.admin');
                default:
                    Auth::logout(); // mencegah login role yang tidak sah
                    return redirect()->route('login')->withErrors([
                        'username' => 'Role tidak valid.',
                    ]);
            }
        }

        // Jangan ulangi Auth::attempt lagi
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
