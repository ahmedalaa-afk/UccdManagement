<?php

use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\InstructorController;
use App\Http\Controllers\Api\V1\ManagerAuth\ManagerAuthController;
use App\Http\Controllers\Api\V1\ManagerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('manager')->group(function () {
    Route::prefix('auth')->controller(ManagerAuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });

    Route::prefix('instructor')->controller(InstructorController::class)->group(function(){
        Route::get('/','getAllInstructors');
        Route::post('/create','CreateInstructor');
        Route::post('/delete','deleteInstructor');
    })->middleware('auth:sanctum');

    Route::prefix('course')->controller(CourseController::class)->group(function(){
        Route::get('/','getAllCourses');
        Route::post('/create','CreateCourse');
        Route::post('/delete','deleteCourse');
    })->middleware('auth:sanctum');

    Route::prefix('student')->controller(UserController::class)->group(function(){
        Route::get('/','getAllStudents');
        Route::post('/import','importStudent');
        Route::get('/export','exportStudent');
    });
    Route::prefix('post')->controller(PostController::class)->group(function(){
        Route::get('/','index');
        Route::post('/create','store');
        Route::post('/edit','update');
        Route::post('/delete','destroy');
    });
});
