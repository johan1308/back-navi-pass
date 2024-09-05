<?php

use App\Http\Controllers\CredentialsController;
use Illuminate\Support\Facades\Route;



Route::prefix('credentials')->group(function () {
    Route::get('/', [CredentialsController::class, 'index']);
    Route::post('/', [CredentialsController::class,'store']);
    Route::get('/{id}', [CredentialsController::class, 'show']);
    Route::patch('/{id}', [CredentialsController::class, 'update']);
    Route::delete('/{id}', [CredentialsController::class,'destroy']);
});


Route::prefix('additional_information')->group(function () {
    Route::get('/', [CredentialsController::class, 'getAllAdditionals']);
    
});
