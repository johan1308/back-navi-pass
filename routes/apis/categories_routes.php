<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use Illuminate\Support\Facades\Route;









Route::apiResource('categories', CategoriesController::class);
Route::apiResource('sub_categories', SubCategoriesController::class);
