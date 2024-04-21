<?php

namespace App\Services\Admin;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Services\BaseService;

class AdminService extends BaseService
{
    /**
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->repository = $adminRepository;
    }
}
