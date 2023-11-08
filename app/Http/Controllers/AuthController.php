<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function loginView()
    {
        return view("login");
    }

    function registerView()
    {
        return view("register");
    }

    function register(Request $request)
    {
        $this->validate($request, [
            "username" => "required|unique:users|max:100|min:4",
            "password" => "required|confirmed|min:4|max:100"
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::attempt($request->only("username", "password"));

        return redirect("/")->with("success", "User created");
    }

    function login(Request $request)
    {
        $this->validate($request, [
            "username" => "required|max:100|min:4",
            "password" => "required|min:4|max:100"
        ]);

        Auth::attempt($request->only("username", "password"));

        return redirect("/")->with("success", "User Logged in");
    }

    function logout()
    {
        Auth::logout();

        return redirect("/")->with("success", "User logged out");
    }
}
