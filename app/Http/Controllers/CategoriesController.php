<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Http\JsonResponse;



class CategoriesController extends Controller
{
    //
    public function index(): JsonResponse
    {
        // $user = Credentials::orderByDesc('id')->paginate(10);
        $user = Categories::all();
        return response()->json($user);
    }

    public function show(): JsonResponse
    {
        $user = Categories::find(1);
        return response()->json($user);
    }


    public function getAllSubCategories(): JsonResponse{
        $user = SubCategories::all();
        return response()->json($user);
    }
    public function getIDSubCategories($id): JsonResponse
    {
        $user = SubCategories::findOrFail($id);
        return response()->json($user);
    }
}
