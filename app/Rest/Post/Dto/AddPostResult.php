<?php

declare(strict_types=1);

namespace App\Rest\Post\Dto;

class AddPostResult
{
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly string $body,
    ) {
    }

    public function getId(): int
    {
        // К сожалению, dummyjson при создании всегда передает идентификатор 151, которого нет.
        // А идентификаторы от 1 до 30
        //        return $this->id;
        return random_int(1, 30);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function all(): array
    {
        return [
            'dummy_post_id' => $this->getId(),
            'title' => $this->getTitle(),
            'body' => $this->getBody(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            title: $data['title'],
            body: $data['body'],
        );
    }
}
