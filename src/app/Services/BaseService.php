<?php

namespace App\Services;

abstract class BaseService
{
    protected $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    /**
     * Get repository
     */
    abstract public function getRepository();

    /**
     * Set repository
     */
    public function setRepository()
    {
        $this->repository = app()->make(
            $this->getRepository()
        );
    }

    /**
     * Create data
     *
     * @param $params
     * @return mixed
     */
    public function createData($params)
    {
        return $this->repository->create($params);
    }

    /**
     * Update data
     *
     * @param $params
     * @return mixed
     */
    public function updateData($params)
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
    public function updateOrCreateData($condition, $params)
    {
        return $this->repository->updateOrCreate($condition, $params);
    }
}
