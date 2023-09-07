<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function paginate(
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): LengthAwarePaginator;

    public function find(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model;

    public function firstWhere(
        array $condition,
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model;

    public function findOrFail(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model;

    public function firstOrFail(
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): Model;

    public function first(
        array $columns = ['*'],
        array $relations = [],
        array $relationsCount = []
    ): ?Model;

    public function create(array $payload): Model;

    public function delete(Model $model): ?bool;

    public function count(): int;
}
