<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require_once base_path('routes/categories/categories_routes.php');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);

