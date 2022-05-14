<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryInterface
{
    /**
     * @var $entity Builder|Model
     */
    protected $entity;

    public function findById($id) {
        return $this->entity->find($id);
    }

    public function findByKey($column, $value)
    {
        return $this->entity->where($column, '=', $value);
    }

    public function deleteEntity($id): int
    {
        return $this->entity->destroy($id);
    }

    public function createEntity(array $entityDetails): Model
    {
        return $this->entity->create($entityDetails);
    }

    public function updateEntity($id, array $entityDetails): int
    {
        return $this->entity->whereKey($id)->update($entityDetails);
    }

    public function findAllRecordsWithLimit(int $limitNumber): LengthAwarePaginator
    {
        return $this->entity->paginate($limitNumber);
    }
}