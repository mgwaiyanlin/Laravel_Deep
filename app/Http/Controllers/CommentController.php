<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        request()->validate([
            "content" => "required|max:240",
        ]);

        Comment::create([
            "user_id" => Auth::user()->id,
            "idea_id" => $idea->id,
            "content" => request()->get("content", ""),
        ]);

        return back()->with("success","You commented on this post.");
    }
}
