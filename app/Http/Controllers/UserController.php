<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->latest()->paginate(2);
        return view("UserPages.Show", compact("user", "ideas"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->ideas()->latest()->paginate(2);
        return view("UserPages.Edit", compact("user", "editing", "ideas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = request()->validate([
            "name" => "required|min:5|max:30",
            "bio" => "nullable|min:1|max:240",
            "image" => "image"
        ]);

        if (request()->has('image')) {
            // check filesystem.php in config so that you will understand the file storage path options.
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            if (!is_null($user->image) && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
        };

        $user->update($validated);

        return redirect()->route("user.show", $user)->with("success", "Your profile updated successfully.");
    }
}
