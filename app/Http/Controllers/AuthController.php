<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view("pages.auth.login");
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            "email" => "email|exists:users,email",
            "password" => "required|string"
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }


        return redirect()->back()->with("error", "Gagal Login, Email atau Password Salah");
    }

    public function register()
    {
        return view("pages.auth.register");
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'name' => "required|string",
            "email" => "email|unique:users,email",
            "password" => "required|string"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
    }
}
