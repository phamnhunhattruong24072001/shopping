<?php

namespace App\Services;

use App\Repositories\Eloquent\CategoryRepository;

class CategoryService extends BaseService
{
    /**
     * Get main repository
     */
    public function getRepository()
    {
        return CategoryRepository::class;
    }
}
