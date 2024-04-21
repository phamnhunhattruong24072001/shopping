<?php

namespace App\Services\Admin;

use App\Services\BaseService;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService extends BaseService
{
    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }
}
