<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        $validated = request()->validate([
            "name" => "required|min:5|max:30",
            "email"=> "required|email|unique:users,email",
            "password" => "required|confirmed|min:8"
        ]);

        User::create([
            "name"=> $validated["name"],
            "email"=> $validated["email"],
            "password"=> bcrypt($validated["password"]),
        ]);

        return redirect()->route("idea.dashboard")->with("success","User created successfully.");
    }
}
