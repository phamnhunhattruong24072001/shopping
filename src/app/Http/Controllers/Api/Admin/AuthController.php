<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\LoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::guard('apiAdmin')->attempt($credentials)) {
            return $this->errorResponse([], 'Login failed');
        }
        return $this->successResponse([
            'token' => $token,
            'user' => auth('apiAdmin')->user()
        ]);
    }
}
