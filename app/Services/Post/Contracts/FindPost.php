<?php

namespace App\Services\Post\Contracts;

use App\Models\Post;

interface FindPost
{
    public function handle(int $id): Post;
}
