<?php

declare(strict_types=1);

namespace App\Services\Post\Handlers;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepositoryInterface;
use App\Rest\Post\Dto\AddPostResult;
use App\Rest\Post\PostApi;
use App\Rest\Transport\Exceptions\JsonDecodeException;
use App\Services\Post\Contracts\CreatePost as CreatePostContract;
use App\Services\Post\Dto\CreatePostData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

final class CreatePost implements CreatePostContract
{
    public function __construct(
        private readonly PostApi $postApi,
        private readonly PostRepositoryInterface $blogRepository,
    ) {
    }

    /**
     * @throws JsonDecodeException
     */
    public function handle(CreatePostData $data): Post
    {
        $user = Auth::user();

        $postData = $this->createPostContent($user, $data);

        return $this->createPost($user, $postData);
    }

    /**
     * @throws JsonDecodeException
     */
    private function createPostContent(User $user, CreatePostData $data): AddPostResult
    {
        return $this->postApi->add($user->id, $data->all());
    }

    private function createPost(User $user, AddPostResult $postData): Model|Post
    {
        return $this->blogRepository->create(array_merge($postData->all(), ['user_id' => $user->id]));
    }
}
