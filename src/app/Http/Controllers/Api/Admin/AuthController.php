<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\LoginRequest;
use App\Http\Requests\Api\Admin\RegisterRequest;
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
        $token = Auth::guard('api_admin')->attempt($credentials);
        if ($token) {
            return $this->successResponse([
                'token' => $token,
                'admin' => auth('api_admin')->user()
            ]);
        }

        return $this->errorResponse([], 'Login failed');
    }

    /**
     * The function register admin api
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $created = $this->adminService->create($request->all());
        if ($created) {
            return $this->successResponse([
                'message' => 'Register success'
            ]);
        }

        return $this->errorResponse([], 'Register failed');
    }
}
