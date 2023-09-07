<?php

namespace App\Services\Post\Contracts;

use App\Models\Post;
use App\Services\Post\Dto\CreatePostData;

interface CreatePost
{
    public function handle(CreatePostData $data): Post;
}
