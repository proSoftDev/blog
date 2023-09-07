<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;

final class PostRepository extends CoreRepository implements PostRepositoryInterface
{
    public function getModelClass(): string
    {
        return Post::class;
    }
}
