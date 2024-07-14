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
            "username" => "exists:users,username",
            "password" => "required|string"
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
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
            "username" => "string|unique:users,username",
            "password" => "required|string",
            "nomor_whatsapp" => "required"
        ]);

        if ($validasi->fails()) {
            return redirect()
                ->back()->with("error", $validasi->errors()->first())->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'no_whatsapp' => $request->nomor_whatsapp,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['username' => $user->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
    }
}
