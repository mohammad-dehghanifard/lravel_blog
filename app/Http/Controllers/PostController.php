<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function getAllPosts(): Collection
    {
        return Post::all();
    }

    public function createPost(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                "title" => "required",
                "description" => "required"
            ],
            [
                "title.required" => "لطفا عنوان مقاله خود را وارد کنید.",
                "description.required" => "لطفا محتوای مقاله خود را وارد کنید"
            ]
        );

        if($validator->fails()) {
            return response() -> json(
                [
                    "success" => false,
                    "message" => $validator->errors()->first()
                ],
                400
            );
        }

        $post = Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "category_id" => $request->category_id
        ]);

        return response() -> json(
            [
                "success" => true,
                "message" => "پست جدید با موفقیت ایجاد شد",
                "post" => $post
            ],
        );
    }

    public function getPostDetail($id): array
    {
        $post = Post::with("category","comments.user","tags")->find($id);
        return [
            "success" => true,
            "post" => $post
        ];
    }

    public function updatePost($id,Request $request): array
    {
        Post::findOrFail($id)-> update(
            [
               "title" => $request->title,
               "description" => $request->description,
            ]
        );

        return [
          "success" => true,
          "message" => "پست با موفقیت ویرایش شد"
        ];
    }

    public function deletePost($id): array
    {
        Post::findOrFail($id) -> delete();
        return [
          "success" => true,
          "message" => "پست مورد نظر با موفقیت حذف شد"
        ];
    }

    public function getTagsPost($id): JsonResponse
    {
        $tag = Tag::with("posts")->findOrFail($id);
        return response()->json(
            [
                "success" => true,
                "data" => $tag
            ]
        );
    }
}
