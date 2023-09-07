<?php

declare(strict_types=1);

namespace App\Services\Post\Handlers;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use App\Rest\Post\PostApi;
use App\Rest\Transport\Exceptions\JsonDecodeException;
use App\Services\Post\Contracts\RetrievePosts as RetrievePostsContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class RetrievePosts implements RetrievePostsContract
{
    public function __construct(
        private readonly PostApi $postApi,
        private readonly PostRepositoryInterface $postRepository,
    ) {
    }

    /**
     * @throws JsonDecodeException
     */
    public function handle(): LengthAwarePaginator
    {
        $posts = $this->getPosts();
        $contents = $this->getPostContents($posts);

        return $this->supplementPostsWithContent($posts, $contents);
    }

    private function getPosts(): LengthAwarePaginator
    {
        return $this->postRepository->paginate(
            columns: ['id', 'dummy_post_id', 'user_id'],
            relations: ['user:id,name']
        );
    }

    /**
     * @throws JsonDecodeException
     */
    private function getPostContents(LengthAwarePaginator $posts): array
    {
        $dummyPostIds = $posts->getCollection()->pluck('dummy_post_id')->toArray();

        return $this->postApi->getAll($dummyPostIds);
    }

    private function supplementPostsWithContent(LengthAwarePaginator $posts, array $contents): LengthAwarePaginator
    {
        $contents = collect($contents)->keyBy('id');

        return $posts->through(fn (Post $post) => $post->assignExternalAttributes($contents->get($post->dummy_post_id)));
    }
}
