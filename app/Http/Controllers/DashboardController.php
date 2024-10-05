<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy("created_at","desc");

        if(request()->has("search")) {
            $ideas = $ideas->where('content', 'LIKE', '%'. request('search') .'%');
        }
        return view("Dashboard", [
            "ideas" => $ideas->paginate(3)
        ]);
    }
}

