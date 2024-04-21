<?php

namespace App\Repositories\Entities;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    /**
     * The abstract function get model
     *
     * @return string
     */
    public function getModel(): string
    {
        return Admin::class;
    }
}
