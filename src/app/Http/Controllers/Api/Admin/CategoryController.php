<?php

namespace App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;
use App\Traits\ApiResponses;

class CategoryController extends Controller
{
    use ApiResponses;

    protected CategoryService $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * The function get list category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(): \Illuminate\Http\JsonResponse
    {
        $categories = $this->categoryService->list();

        return $this->successResponse(['data' => $categories]);
    }

    public function showProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('user.profile', ['user' => $user]);
    }

    public function showErrorPsr2( Request $request,$id ){
$user=User::findOrFail($id);
return view('user.profile',['user'=>$user]);
}}
}
