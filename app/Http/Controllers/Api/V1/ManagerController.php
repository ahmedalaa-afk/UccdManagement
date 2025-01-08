<?php

namespace App\Http\Controllers\Api\V1;

use App\Exports\ExportStudent;
use App\Helpers\ApiResponse;
use App\Helpers\Slugable;
use App\Http\Controllers\Controller;
use App\Http\Requests\craeteCourseRequest;
use App\Http\Requests\CreateInstructorRequest;
use App\Http\Requests\DeleteCourseRequest;
use App\Http\Requests\DeleteInstructorRequest;
use App\Http\Requests\ImportStudentsRequset;
use App\Models\Manager;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Http\Resources\CoursesResource;
use App\Http\Resources\CreateCourseResource;
use App\Imports\StudentsImport;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManagerRequest $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
