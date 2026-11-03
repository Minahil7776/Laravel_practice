<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function store(Request $request){
        $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8'],
]);


        User::create($validated);

        return redirect('/login')
        ->with("success", "Registration Successful!");
    }

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email'=> 'Invalid Email or Password',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
