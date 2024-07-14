<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validasi = Validator::make($request->all(), [
            'name' => "required|string",
            "email" => "email|unique:users,email",
            "password" => "required|string",
            "nomor_whatsapp" => "required"
        ]);

        if ($validasi->fails()) {
            return redirect()
                ->back()->with("error", $validasi->errors()->first())->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_whatsapp' => $request->nomor_whatsapp,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
    }
}
