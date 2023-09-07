<?php

namespace App\Services\Post\Contracts;

use App\Models\Post;

interface DeletePost
{
    public function handle(Post $blog): void;
}
