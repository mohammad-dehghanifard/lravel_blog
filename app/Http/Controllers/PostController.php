<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllPosts(): array
    {
        return [
            [
                "id" => 1,
                "title" => "test"
            ],
            [
                "id" => 1,
                "title" => "test"
            ]
        ];
   }

    public function createPost(Request $request): string
    {
        return "post title : $request->title";
    }
    public function getPostDetail($id): string
    {
        return "post id : $id";
    }
}
