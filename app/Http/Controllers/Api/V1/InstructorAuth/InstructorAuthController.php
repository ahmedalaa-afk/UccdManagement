<?php

namespace App\Http\Controllers\Api\V1\InstructorAuth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorLoginRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorAuthController extends Controller
{
    public function login(InstructorLoginRequest $request)
    {
        if (Auth::guard('instructor')->attempt($request->only(['email', 'password']))) {
            $user = Instructor::where('email', $request->email)->first();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'token' => $user->createToken('loginInstructorToken')->plainTextToken,
            ];
            return ApiResponse::sendResponse('Instructor Log in successfully', $data);
        }
        return ApiResponse::sendResponse('Invalid credentials', []);
    }
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
            return ApiResponse::sendResponse('Instructor logged out successfully', []);
        }

        return ApiResponse::sendResponse('Instructor is not authenticated', []);
    }
}
