<?php

use App\Http\Controllers\AdditionalInformationController;
use App\Http\Controllers\CredentialsController;
use Illuminate\Support\Facades\Route;





Route::apiResource('credentials', CredentialsController::class);
Route::apiResource('additional_information', AdditionalInformationController::class);



