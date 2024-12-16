<?php

namespace App\Http\Controllers\Api\V1\ManagerAuth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerLoginRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    public function login(ManagerLoginRequest $request)
    {
        if (Auth::guard('manager')->attempt($request->only(['email', 'password']))) {
            $user = Manager::where('email',$request->email)->first();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'token' => $user->createToken('loginManagerToken')->plainTextToken,
            ];
            return ApiResponse::sendResponse('Manager Log in successfully', $data);
        }
        return ApiResponse::sendResponse('Invalid credentials', []);
    }
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
            return ApiResponse::sendResponse('Manager logged out successfully', []);
        }

        return ApiResponse::sendResponse('Manager is not authenticated', []);
    }
}
