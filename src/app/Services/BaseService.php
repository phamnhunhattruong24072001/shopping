<?php

namespace App\Services;

abstract class BaseService
{
    protected $repository;

    /**
     * Create data
     *
     * @param $params
     * @return mixed
     */
    public function create($params): mixed
    {
        return $this->repository->create($params);
    }

    /**
     * Update data
     *
     * @param $params
     * @return mixed
     */
    public function update($params): mixed
    {
        return $this->repository->update($params);
    }

    /**
     * Update or create data
     *
     * @param $condition
     * @param $params
     * @return mixed
     */
    public function updateOrCreate($condition, $params): mixed
    {
        return $this->repository->updateOrCreate($condition, $params);
    }
}
