<?php

declare(strict_types=1);

namespace App\Services\Post\Handlers;

use App\Models\Post;
use App\Rest\Post\PostApi;
use App\Rest\Transport\Exceptions\JsonDecodeException;
use App\Services\Post\Contracts\UpdatePost as UpdatePostContract;
use App\Services\Post\Dto\UpdatePostData;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

final class UpdatePost implements UpdatePostContract
{
    public function __construct(
        private readonly PostApi $postApi,
    ) {
    }

    /**
     * @throws AuthorizationException
     * @throws JsonDecodeException
     */
    public function handle(Post $blog, UpdatePostData $data): void
    {
        $this->authorize($blog);

        $this->updatePostContent($blog, $data);
    }

    /**
     * @throws AuthorizationException
     */
    private function authorize(Post $blog)
    {
        Gate::authorize('update', $blog);
    }

    /**
     * @throws JsonDecodeException
     */
    private function updatePostContent(Post $blog, UpdatePostData $data): void
    {
        $this->postApi->update($data->setId($blog->id)->all());
    }
}
