<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract public function getModelClass(): string;

    public function paginate(
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): LengthAwarePaginator {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relationsCount)
            ->paginate();
    }

    public function firstWhere(
        array $condition,
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relationsCount)
            ->firstWhere($condition);
    }

    public function find(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relationsCount)
            ->find($modelId);
    }

    public function findOrFail(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relationsCount)
            ->findOrFail($modelId);
    }

    public function firstOrFail(
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relationsCount)
            ->firstOrFail();
    }

    public function first(
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relationsCount)
            ->first();
    }

    public function create(array $payload): Model
    {
        return $this->model
            ->query()
            ->create($payload);
    }

    public function delete(Model $model): ?bool
    {
        return $model->delete();
    }

    public function count(): int
    {
        return $this->model
            ->query()
            ->count();
    }
}
