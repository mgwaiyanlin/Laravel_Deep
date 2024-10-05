<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;

// idea routes
Route::get("/", [DashboardController::class,"index"])->name("idea.dashboard");
Route::post("/idea/store", [IdeaController::class, "store"])->name("idea.store");
Route::get("/idea/edit/{idea}", [IdeaController::class,"edit"])->name("idea.edit");
Route::put("/idea/update/{idea}", [IdeaController::class,"update"])->name("idea.update");
Route::delete("/idea/delete/{idea}", [IdeaController::class,"destroy"])->name("idea.delete");
Route::get("/idea/show/{idea}", [IdeaController::class, "show"])->name("idea.show");

// comment routes
Route::post("/idea/{idea}/comment", [CommentController::class, 'store'])->name('idea.comment');

// Authentication routes
Route::view("/register", "Auth.Register")->name("page.register");
Route::post("/user/register", [AuthController::class,"register"])->name("page.register.create");
Route::view("/login", "Auth.Login")->name("page.login");
Route::post('/user/login', [AuthController::class,'login'])->name('page.login.action');

// term routes
Route::view("/terms", "Terms")->name("itea.terms");

