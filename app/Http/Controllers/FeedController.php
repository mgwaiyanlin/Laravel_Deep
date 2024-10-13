<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followedIds = Auth::user()->followings()->pluck("user_id");

        $ideas = Idea::whereIn("user_id", $followedIds)->latest();

        if(request()->has("search")) {
            $ideas = $ideas->where('content', 'LIKE', '%'. request('search') .'%');
        }
        return view("Dashboard", [
            "ideas" => $ideas->paginate(3)
        ]);
    }
}
