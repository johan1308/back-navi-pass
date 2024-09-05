<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Credentials;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index(): JsonResponse
    {
        // $user = Credentials::orderByDesc('id')->paginate(10);
        $user = Credentials::all();
        return response()->json($user);
    }

    public function show(): JsonResponse
    {
        $user = Credentials::find(1);
        return response()->json($user);
    }
}
