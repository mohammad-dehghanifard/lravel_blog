<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("posts",[PostController::class,"getAllPosts"]);
Route::post("add_post",[PostController::class,"createPost"]);
Route::get("posts/{id}",[PostController::class,"getPostDetail"]);
Route::put("edit-post/{id}",[PostController::class,"updatePost"]);
Route::delete("delete-post/{id}",[PostController::class,"deletePost"]);


Route::get("categories",[CategoryController::class,"getPosts"]);
Route::post("create-category",[CategoryController::class,"createCategory"]);
