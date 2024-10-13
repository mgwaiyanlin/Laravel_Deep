<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea) {
        $liker = Auth::user();
        // dd($idea);
        $liker->likes()->attach($idea->id);

        return back()->with("success","You liked a post.");
    }

    public function unlike(Idea $idea) {
        $unliker = Auth::user();
        $unliker->likes()->detach($idea->id);
        return back()->with("success","You unliked a post.");
    }
}
