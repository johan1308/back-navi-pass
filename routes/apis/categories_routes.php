<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;





Route::prefix('sub_categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'getAllSubCategories']);
    Route::get('/{id}', [CategoriesController::class, 'getIDSubCategories']);
});


Route::apiResource('categories', CategoriesController::class);
