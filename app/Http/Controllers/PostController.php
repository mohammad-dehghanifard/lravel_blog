<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllPosts(): Collection
    {
        return Post::all();
    }

    public function createPost(Request $request): array
    {
        $post = Post::create([
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return [
            "success" => true,
            "message" => "پست جدید با موفقیت ایجاد شد",
            "post" => $post
        ];
    }

    public function getPostDetail($id): array
    {
        $post = Post::find($id);
        return [
            "success" => true,
            "post" => $post
        ];
    }
}
