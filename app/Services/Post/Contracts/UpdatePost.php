<?php

namespace App\Services\Post\Contracts;

use App\Models\Post;
use App\Services\Post\Dto\UpdatePostData;

interface UpdatePost
{
    public function handle(Post $blog, UpdatePostData $data): void;
}
