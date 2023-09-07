<?php

declare(strict_types=1);

namespace App\Services\Post\Handlers;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use App\Rest\Post\Dto\GetPostResult;
use App\Services\Interaction\Exceptions\ExternalValueNotFoundException;
use App\Services\Post\Contracts\FindPost as FindPostContract;
use App\Rest\Post\PostApi;
use App\Rest\Transport\Exceptions\JsonDecodeException;
use Illuminate\Database\Eloquent\Model;

class FindPost implements FindPostContract
{
    public function __construct(
        private readonly PostApi $postApi,
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    /**
     * @throws JsonDecodeException
     * @throws ExternalValueNotFoundException
     */
    public function handle(int $id): Post
    {
        $post = $this->findPost($id);
        $content = $this->findPostContent($post);

        return $post->assignExternalAttributes($content->all());
    }

    private function findPost(int $id): Post|Model
    {
        return $this->postRepository->findOrFail($id);
    }

    /**
     * @throws JsonDecodeException
     */
    private function findPostContent(Post $post): GetPostResult
    {
        return $this->postApi->findById($post->dummy_post_id);
    }
}

