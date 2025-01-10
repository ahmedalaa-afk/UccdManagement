<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInstructorRequest;
use App\Http\Requests\DeleteInstructorRequest;
use App\Models\Instructor;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Manager;

class InstructorController extends Controller
{
    public function getAllInstructors()
    {
        $instructors = Instructor::all();
        return ApiResponse::sendResponse('All Instructions retrieved successfully', $instructors);
    }
    public function CreateInstructor(CreateInstructorRequest $request)
    {
        $manager = Manager::first();

        $instructor = Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
            'manager_id' => $manager->id,
        ]);

        $instructor->assignRole('instructor', 'instructor');

        return ApiResponse::sendResponse('Instructor created successfully', $instructor);
    }


    public function deleteInstructor(DeleteInstructorRequest $request)
    {
        $instructor = Instructor::where('email', $request->email)->first();
        if ($instructor) {
            $instructor->delete();
            return ApiResponse::sendResponse('Instructor deleted successfully', []);
        }
        return ApiResponse::sendResponse('Instructor not found', []);
    }
}
