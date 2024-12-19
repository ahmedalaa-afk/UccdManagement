<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInstructorRequest;
use App\Http\Requests\DeleteInstructorRequest;
use App\Models\Manager;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getAllInstructors(){
        $instructors = Instructor::all();
        return ApiResponse::sendResponse('All Instructions retrieved successfully', $instructors);
    }
    public function CreateInstructor(CreateInstructorRequest $request){
        $manager = Manager::first();
        $instructor = Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
            'manager_id' => $manager->id,
        ]);
        return ApiResponse::sendResponse('Instructor created successfully', $instructor);
    }

    public function deleteInstructor(DeleteInstructorRequest $request){
        $instructor = Instructor::where('email',$request->email)->first();
        if($instructor){
            $instructor->delete();
            return ApiResponse::sendResponse('Instructor deleted successfully', []);
        }
        return ApiResponse::sendResponse('Instructor not found', []);
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
