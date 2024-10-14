<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view('IdeaPages.Show', [
            'idea' => $idea,
        ]);
    }
    public function store()
    {
        request()->validate([
            "content" => "required|min:5|max:240",
        ]);

        Idea::create([
            "user_id" => Auth::user()->id,
            "content" => request()->get("content", ""),
        ]);

        return redirect()->route("idea.dashboard")->with("success", "Idea was created successfully.");
    }

    public function edit(Idea $idea)
    {
        // if(Auth::user()->id !== $idea->user_id) {
        //     abort(404);
        // }

        Gate::authorize('idea.edit', $idea);
        $editing = true;

        return view("IdeaPages.Show", compact("idea", "editing"));
    }

    public function update(Idea $idea)
    {
        // if(Auth::user()->id !== $idea->user_id) {
        //     abort(404);
        // }

        Gate::authorize('idea.edit', $idea);

        request()->validate([
            "content"=> "required|min:5|max:240",
        ]);

        $idea->content = request()->get("content", "");
        $idea->save();

        return redirect()->route("idea.show", compact("idea"))->with("success","Idea was updated successfully.");
    }

    // public function destroy($id)
    // {
    //     Idea::where("id", $id)->firstOrFail()->delete();
    //     return redirect()->route("idea.dashboard")->with("success","Idea was deleted successfully.");
    // }

    public function destroy(Idea $idea)
    {
        // if(Auth::user()->id !== $idea->user_id) {
        //     abort(404);
        // }
        Gate::authorize('idea.delete', $idea);
        $idea->delete();
        return redirect()->route("idea.dashboard")->with("success","Idea was deleted successfully.");
    }
}
