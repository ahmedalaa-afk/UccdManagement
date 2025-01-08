<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\craeteCourseRequest;
use App\Http\Requests\DeleteCourseRequest;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CoursesResource;
use App\Http\Resources\CreateCourseResource;
use App\Models\Instructor;

class CourseController extends Controller
{

    public function getAllCourses()
    {
        $courses = Course::all();
        if ($courses) {
            return ApiResponse::sendResponse('All Courses retrieved successfully', CoursesResource::collection($courses));
        }
        return ApiResponse::sendResponse('No Courses found', []);
    }

    public function CreateCourse(craeteCourseRequest $request)
    {
        $instructor = Instructor::where('email', $request->instructor_email)->first();
        if ($instructor) {
            $course = Course::create([
                'title' => $request->title,
                'slug' => uuid_create(),
                'description' => $request->description,
                'instructor_id' => $instructor->id,
                'location' => $request->location,
                'status' => $request->status,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
                'manager_id' => $instructor->manager->id,
            ]);
            return ApiResponse::sendResponse('Course created successfully', new CreateCourseResource($course));
        }
        return ApiResponse::sendResponse('Instructor not found', []);
    }

    public function deleteCourse(DeleteCourseRequest $request)
    {
        $course = Course::where('slug', $request->slug)->first();
        if ($course) {
            $course->delete();
            return ApiResponse::sendResponse('Course Deleted Successfuly', []);
        }
        return ApiResponse::sendResponse('Course not found', []);
    }
}
