<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        $data['title'] = "Aplikasi";
        return view('backend.auth.login', $data);
    }
    public function register()
    {
        $data['title'] = "Aplikasi";
        return view('backend.auth.register', $data);
    }
    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $cekUsers = User::where('email', $request->email)->first();
        if (isset($cekUsers->email)) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $session = User::where('email', $request->email)->first();
                // dd($session);
                Session::put('full_name', $session->full_name);

                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                return back()->withInput()->withErrors([
                    'password' => 'Password salah',
                ]);
            }
        } else {
            return back()->withInput()->withErrors([
                'email' => 'Email salah',
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
