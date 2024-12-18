<?php

use App\Http\Controllers\Api\V1\ManagerAuth\ManagerAuthController;
use App\Http\Controllers\Api\V1\ManagerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('manager')->group(function () {
    Route::prefix('auth')->controller(ManagerAuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });

    Route::prefix('instructor')->controller(ManagerController::class)->group(function(){
        Route::get('/','getAllInstructors');
        Route::post('/create','CreateInstructor');
    })->middleware('auth:sanctum');
});
