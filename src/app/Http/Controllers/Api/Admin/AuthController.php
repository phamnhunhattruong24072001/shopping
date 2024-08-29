<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\LoginRequest;
use App\Services\Admin\AdminService;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    protected AdminService $adminService;

    /**
     * @param AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
        $this->middleware('auth:apiAdmin', ['except' => ['login']]);
    }

    /**
     * The function login admin api
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = array_merge($request->only(['email', 'password']), ['status' => config('common.status.active')]);
        $token = Auth::guard('apiAdmin')->attempt($credentials);
        if ($token) {
            return $this->createNewToken($token);
        }

        return $this->errorResponse([], 'Login failed');
    }

    /**
     * The function forgot password admin api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(): \Illuminate\Http\JsonResponse
    {
       return $this->errorResponse([], 'Forgot password');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth('apiAdmin')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return $this->successResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('apiAdmin')->factory()->getTTL() * 60,
            'user' =>auth('apiAdmin')->user()
        ]);
    }
}
