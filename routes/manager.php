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
        Route::post('/delete','deleteInstructor');
    })->middleware('auth:sanctum');

    Route::prefix('course')->controller(ManagerController::class)->group(function(){
        Route::get('/','getAllCourses');
        Route::post('/create','CreateCourse');
        Route::post('/delete','deleteCourse');
    })->middleware('auth:sanctum');

    Route::prefix('student')->controller(ManagerController::class)->group(function(){
        Route::get('/','getAllStudents');
        Route::post('/import','importStudent');
        Route::post('/export','deleteStudent');
    });
});
