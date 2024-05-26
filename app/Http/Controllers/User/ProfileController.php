<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view("pages.user.profile.edit");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "name" => "required",
        ]);

        $data = $request->except("_method", "_token", "password_confirmation", "password");

        if ($request->password_confirmation) {
            $request->validate([
                "password" => "required|confirmed"
            ]);

            $data["password"] = Hash::make($request->password);
        }

        if (auth()->user()->email !== $request->email) {
            $request->validate([
                'email' => "required|unique:users,email"
            ]);
        }


        $user = User::where("id", auth()->user()->id)->update($data);

        return redirect()->back()
            ->with("success", "Berhasil update profile");
    }
}
