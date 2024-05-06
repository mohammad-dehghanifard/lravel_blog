<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{


    public function getPosts(): JsonResponse
    {
        $data = Category::with("posts")->get();
        return response()->json([
            "success" => true,
            "data" => $data
        ]);
    }

    public function createCategory(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                "title" => "required"
            ],
            [
                "title.required" => "وارد کردن عنوان الزامی میباشد"
            ]
        );

        if($validator->fails())
        {
            return response()->json(
                [
                    "success" => false,
                    "message" => $validator->errors()->first()
                ]
            );
        }

        $category = Category::create([
            "title" => $request->title
        ]);

        return  response() -> json(
            [
                "success" => true,
                "category" => $category,
                "message" => "دسته بندی مورد نظر با موفقیت ایجاد شد"
            ]
        );
    }

    public function updateCategory($id,Request $request): JsonResponse
    {
        $category = Category::findOrFail($id) -> update(
            [
                "title" => $request->title
            ]
        );
        return response()->json(
            [
                "success" => true,
                "message" => "دسته بندی مورد نظر با موفقیت ویرایش شد"
            ]
        );
    }
}
