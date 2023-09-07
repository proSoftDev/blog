<?php

declare(strict_types=1);

namespace App\Rest\Post;

use App\Rest\ApiHandler;
use App\Rest\Post\Dto\AddPostResult;
use App\Rest\Post\Dto\GetPostResult;
use App\Rest\Post\Dto\UpdatePostResult;
use App\Rest\Transport\Exceptions\JsonDecodeException;
use Arr;

class PostApi extends ApiHandler
{
    /**
     * @throws JsonDecodeException
     */
    public function getAll(array $ids): array
    {
        $response = $this->request('GET', 'posts');

        return Arr::get($response, 'posts', []);
    }

    /**
     * @throws JsonDecodeException
     */
    public function findById(int $id): GetPostResult
    {
        $response = $this->request('GET', "posts/$id");

        return GetPostResult::fromArray($response);
    }

    /**
     * @throws JsonDecodeException
     */
    public function add(int $userId, array $post): AddPostResult
    {
        $response = $this->request('POST', 'posts/add', [
            'json' => [
                'userId' => $userId,
                'title' => $post['title'],
                'body' => $post['body'],
            ],
        ]);

        return AddPostResult::fromArray($response);
    }

    /**
     * @throws JsonDecodeException
     */
    public function update(array $post): UpdatePostResult
    {
        $response = $this->request('PUT', "posts/{$post['id']}", [
            'json' => [
                'title' => $post['title'],
                'body' => $post['body'],
            ],
        ]);

        return UpdatePostResult::fromArray($response);
    }

    /**
     * @throws JsonDecodeException
     */
    public function delete(int $postId): void
    {
        $this->request('DELETE', "posts/$postId");
    }

    /**
     * @throws JsonDecodeException
     */
    public function request(string $method, string $url, array $options = []): mixed
    {
        $response = $this->transport->request(
            $method,
            trim(config('rest.post.url'), '/').'/'.trim($url, '/'),
            $options
        );

        return $this->parseResponse($response);
    }
}
