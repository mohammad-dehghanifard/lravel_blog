<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
Route::get("tag/{id}",[PostController::class,"getTagsPost"]);


Route::get("categories",[CategoryController::class,"getPosts"]);
Route::post("create-category",[CategoryController::class,"createCategory"]);
Route::put("update-category/{id}",[CategoryController::class,"updateCategory"]);
Route::put("delete-category/{id}",[CategoryController::class,"deleteCategory"]);

Route::get("user/{id}",[UserController::class,"getUserDetail"]);
