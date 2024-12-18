<?php

use App\Http\Controllers\Api\V1\InstructorAuth\InstructorAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('instructor')->group(function () {
    Route::prefix('auth')->controller(InstructorAuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });
});
