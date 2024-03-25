<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("posts",[PostController::class,"getAllPosts"]);
Route::post("add_post",[PostController::class,"createPost"]);
Route::get("posts/{id}",[PostController::class,"getPostDetail"]);
