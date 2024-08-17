<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => 'required'
        ]);

        try{
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->has('remember-me')))
            {
                return redirect()->route('dashboard');
            }

            // gagal auth
            return back()->withErrors('username atau password salah')->withInput(['email' => $request->input('email')]);
        }

        catch(\Throwable $th)
        {
            return back()->with('error', 'gagal dalam autentikasi. coba lagi nanti!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email', 'min:5', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6']
        ]);

        try{
            $user = \App\Models\User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            return redirect()->route('login')->with('success', 'berhasil membuat user baru, silahkan login');
        }

        catch(\Throwable $th)
        {
            return back()->with('error', 'gagal dalam membuat user baru. coba lagi nanti!');
        }
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
        }

        return redirect()->intended();
    }
}