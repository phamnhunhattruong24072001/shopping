<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    /**
     * The function get all item
     *
     * @param array $columns
     * @return mixed
     */
    public function getAll(array $columns = []): mixed;

    /**
     * Get one item
     *
     * @param $id
     * @return mixed
     */
    public function find($id): mixed;

    /**
     * The function find by condition
     *
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere(array $where, array $columns = []): mixed;

    /**
     * Create item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []): mixed;

    /**
     * Update item
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes = []): mixed;

    /**
     * Delete item by id
     *
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;

    public function exists(array $attributes = []): bool;
}
