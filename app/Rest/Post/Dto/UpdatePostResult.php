<?php

declare(strict_types=1);

namespace App\Rest\Post\Dto;

class UpdatePostResult
{
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly string $body,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
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
            'id' => $this->getId(),
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
