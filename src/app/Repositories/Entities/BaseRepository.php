<?php

namespace App\Repositories\Entities;

use App\Repositories\Interfaces\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel(): void
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * The function get all item
     *
     * @param array $columns
     * @return mixed
     */
    public function getAll(array $columns = []): mixed
    {
        return $this->model->all();
    }

    /**
     * Get one item
     *
     * @param $id
     * @return mixed
     */
    public function find($id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * Get one item where
     *
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere(array $where, array $columns = []): mixed
    {
        return $this->model->where($where)->first($columns);
    }

    /**
     * Create item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []): mixed
    {
        return $this->model->create($attributes);
    }

    /**
     * Update item
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes = []): mixed
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete item by id
     *
     * @param $id
     * @return mixed
     */
    public function delete($id): bool
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * The function check column exist
     *
     * @param array $attributes
     * @return bool
     */
    public function exists(array $attributes = []): bool
    {
        return $this->model->where($attributes)->exists();
    }
}
