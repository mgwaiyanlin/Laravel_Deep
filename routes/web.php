<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;

// idea routes
Route::get("/", [DashboardController::class,"index"])->name("idea.dashboard");

Route::group(["prefix"=> "idea/", "as"=> "idea.", "middleware"=> ["auth"]], function () {
    // The way of unaffecting middleware to a route.
    // Route::post("store", [IdeaController::class, "store"])->name("store")->withoutMiddleware("auth");
    Route::post("store", [IdeaController::class, "store"])->name("store");
    Route::get("edit/{idea}", [IdeaController::class,"edit"])->name("edit");
    Route::put("update/{idea}", [IdeaController::class,"update"])->name("update");
    Route::delete("delete/{idea}", [IdeaController::class,"destroy"])->name("delete");
    Route::get("show/{idea}", [IdeaController::class, "show"])->name("show");
    Route::post("{idea}/comment", [CommentController::class, 'store'])->name('comment');
});

// Resource Routing :: is the same as above the old way route style.
// !WARNING! needs to follow the routing name rules
// Route::resource('idea', IdeaController::class)->except('index', 'create')->middleware('auth');
Route::resource('user', UserController::class)->only('show');
Route::resource('user', UserController::class)->only('edit', 'update')->middleware('auth');

Route::post('/user/{user}/follow', [FollowerController::class,'follow'])->name('user.follow');
Route::post('/user/{user}/unfollow', [FollowerController::class,'unfollow'])->name('user.unfollow');

Route::post('/ideas/{idea}/like', [IdeaLikeController::class,'like'])->middleware('auth')->name('idea.like');
Route::post('/ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('idea.unlike');

// Authentication routes

Route::group(['middleware' => 'guest'], function () {
    Route::view("/register", "Auth.Register")->name("register");
    Route::post("/user/register", [AuthController::class,"register"])->name("register.create");
    Route::view("/login", "Auth.Login")->name("login");
    Route::post('/user/login', [AuthController::class,'login'])->name('login.action');
});
Route::post("/logout", [AuthController::class, "logout"])->middleware('auth')->name("logout");

Route::get('/followed-feed', FeedController::class)->middleware('auth')->name('followed-feed');

// term routes
Route::view("/terms", "Terms")->name("itea.terms");

// admin routes
Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth', 'can:isUserAdmin'])->name('admin.dashboard');
