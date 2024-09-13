<?php
use App\Http\Controllers\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware("auth:sanctum")->group(function () {
    require_once base_path('routes/apis/categories_routes.php');
    require_once base_path('routes/apis/credentials_routes.php');
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/login', [AuthController::class, 'login']);
Route::get('/verify', [AuthController::class, 'verify'])->name('verify');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
