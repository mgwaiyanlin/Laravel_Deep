<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = Auth::user();
        $follower->followings()->attach($user);

        return back()->with("success","Followed successfully.");
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();
        $follower->followings()->detach($user);

        return back()->with("success","Unfollowed successfully.");
    }
}
