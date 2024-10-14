<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

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
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user exists
        $cekUsers = User::where('email', $request->email)->first();

        if ($cekUsers) {
            // Attempt to login the user with the 'remember' option
            $remember = $request->has('remember'); // Check if 'remember' is checked

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                $session = User::where('email', $request->email)->first();

                // Store user full name in session
                Session::put('full_name', $session->full_name);

                // Regenerate session to prevent session fixation attacks
                $request->session()->regenerate();

                // Redirect to the intended page
                return redirect()->intended('/dashboard');
            } else {
                // Return back with password error if authentication fails
                return back()->withInput()->withErrors([
                    'password' => 'Password salah',
                ]);
            }
        } else {
            // Return back with email error if no user is found
            return back()->withInput()->withErrors([
                'email' => 'Email salah',
            ]);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $cekEmail = User::where('email', $user->email)->first();
        // dd($user);
        if ($cekEmail == null) {
            User::insert([
                'google_id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email,
                'image' => $user->avatar,
                'remember_token' => $user->token,
                'role_id' => 3,
                'status' => 'ACTIVE',
                'created_at' => now(),
            ]);
            return redirect('/dashboard');
        } elseif ($cekEmail != null) {
            DB::table('users')->where('id', $cekEmail->id)->update(['google_id' => $user->id, 'remember_token' => $user->token]);
            Auth::login($cekEmail, true);
            return redirect('/dashboard');
        } else {
            if ($cekEmail->nik != null && $cekEmail->full_name != null && $cekEmail->email != null && $cekEmail->remember_token != null && $cekEmail->role_id != null) {

                Auth::login($cekEmail);
                return redirect('/dashboard');
            } else {
                if ($cekEmail->status == 'INACTIVE' && $cekEmail->nik != null && $cekEmail->full_name != null && $cekEmail->email != null && $cekEmail->role_structure != null) {
                    return redirect('/')->withInput()->withErrors([
                        'status' => 'Email sedang tidak aktif!!',
                    ]);
                } else {
                    return redirect('/auth/loginVerif/' . $user->id . '');
                }
            }
        }
    }

    public function registerAction(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        try {
            // Create a new user in the database
            $user = User::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash the password
                'role_id' => 3
            ]);

            // Return a successful JSON response
            return response()->json([
                'message' => 'User registered successfully.',
                'user' => $user
            ], 201); // HTTP status 201 means "Created"

        } catch (\Exception $e) {
            // Handle any errors that might occur
            return response()->json([
                'message' => 'Registration failed. Please try again.',
                'error' => $e->getMessage()
            ], 500); // HTTP status 500 means "Internal Server Error"
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
