<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserDetail($id): JsonResponse
    {
        $user = User::with("address")->findOrFail($id);

        if(!$user)
        {
           return response()->json(
                [
                    "success" => false,
                    "message" => "کاربر مورد نظر یافت نشد"
                ]
            );
        } else {
          return  response()->json(
                [
                    "success" => true,
                    "user" => $user,
                    "message" => "عملیات موفق"
                ]
            );
        }
    }
}
