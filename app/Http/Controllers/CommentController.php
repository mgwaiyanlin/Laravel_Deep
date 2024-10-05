<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        request()->validate([
            "content" => "required|max:240",
        ]);

        Comment::create([
            "idea_id" => $idea->id,
            "content" => request()->get("content", ""),
        ]);

        return back()->with("success","You commented on this post.");
    }
}
