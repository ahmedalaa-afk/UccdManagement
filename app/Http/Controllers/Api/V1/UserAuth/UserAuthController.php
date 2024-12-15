<?php

namespace App\Http\Controllers\Api\V1\UserAuth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = $request->user();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'token' => $user->createToken('loginUserToken')->plainTextToken,
            ];
            return ApiResponse::sendResponse('User Log in successfully', $data);
        }
        return ApiResponse::sendResponse('Invalid credentials', []);
    }
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
            return ApiResponse::sendResponse('User logged out successfully', []);
        }

        return ApiResponse::sendResponse('User is not authenticated', []);
    }
}
