<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
