<?php

declare(strict_types=1);

namespace App\Services\Post\Handlers;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use App\Rest\Post\PostApi;
use App\Rest\Transport\Exceptions\JsonDecodeException;
use App\Services\Post\Contracts\DeletePost as DeletePostContract;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

final class DeletePost implements DeletePostContract
{
    public function __construct(
        private readonly PostApi $postApi,
        private readonly PostRepositoryInterface $blogRepository,
    ) {
    }

    /**
     * @throws AuthorizationException
     * @throws JsonDecodeException
     */
    public function handle(Post $blog): void
    {
        $this->authorize($blog);

        $this->deletePostContent($blog);
        $this->deletePost($blog);
    }

    /**
     * @throws AuthorizationException
     */
    private function authorize(Post $blog)
    {
        Gate::authorize('delete', $blog);
    }

    /**
     * @throws JsonDecodeException
     */
    private function deletePostContent(Post $blog): void
    {
        $this->postApi->delete($blog->dummy_post_id);
    }

    private function deletePost(Post $blog): void
    {
        $this->blogRepository->delete($blog);
    }
}
