<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require_once base_path('routes/apis/categories_routes.php');

require_once base_path('routes/apis/credentials_routes.php');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
