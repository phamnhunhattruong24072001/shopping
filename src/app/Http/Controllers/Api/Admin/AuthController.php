<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\LoginRequest;
use App\Http\Requests\Api\Admin\RegisterRequest;
use App\Models\Admin;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    /**
     * The function login admin api
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = array_merge($request->only(['email', 'password']), ['status' => 1]);

        if (!$token = Auth::guard('apiAdmin')->attempt($credentials)) {
            return $this->errorResponse([], 'Login failed');
        }

        return $this->successResponse([
            'token' => $token,
            'user' => auth('apiAdmin')->user()
        ]);
    }

    /**
     * The function register admin api
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        if (!Admin::create($request->all())) {
            return $this->errorResponse([], 'Register failed');
        }

        return $this->successResponse([
            'message' => 'Register success'
        ]);
    }
}
