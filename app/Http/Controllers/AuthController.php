<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        $validated = request()->validate([
            "name" => "required|min:5|max:30",
            "email"=> "required|email|unique:users,email",
            "password" => "required|confirmed|min:8"
        ]);

        $user = User::create([
            "name"=> $validated["name"],
            "email"=> $validated["email"],
            "password"=> bcrypt($validated["password"]),
        ]);
        // to send email to user after registration succeeded!
        Mail::to($validated["email"])->send(new WelcomeEmail($user));

        return redirect()->route("idea.dashboard")->with("success","User created successfully.");
    }

    public function login()
    {
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route("idea.dashboard")->with("success","Login Successful.");
        }

        return back()->withErrors([
            "error" => "No matching user found with the provided email and password"
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("idea.dashboard")->with("success","Logout Successfully!");
    }
}
