<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    const PAGE_NAME = "SIGN IN";
    const PAGE_TITLE = "SIGN IN";

    public function registerForm()
    {
        $data["pageName"] = self::PAGE_NAME;
        return view("auth.register")->with($data);
    }

    public function register(Request $request)
    {
        $data["pageName"] = self::PAGE_NAME;

        $data = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,id",
            "password" => "required|string|min:6|confirmed",
        ]);
        $data["password"] = bcrypt($data["password"]);

        $user = User::create($data);
        Auth::login($user);
        return redirect(route("admin.homepage"))->with($data);
    }

    public function loginForm()
    {
        $data["pageName"] = self::PAGE_NAME;

        return view("auth.login")->with($data);
    }

    public function login(Request $request)
    {
        $data["pageName"] = self::PAGE_NAME;

        $data = $request->validate([
            "email" => "required|string",
            "password" => "required|string|min:6",
        ]);

        $is_login = Auth::attempt(["email" => $data["email"], "password" => $data["password"]]);


        if (!$is_login) {
            return redirect(route("auth.loginForm"))->withErrors("credentials not correct");
        }

        if (Auth::user()->role !== "admin"  ) {
            return redirect(route("auth.loginForm"))->withErrors("Only admins can login");
        }
        return redirect(route("admin.homepage"))->with($data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route("auth.login"));
    }
}
