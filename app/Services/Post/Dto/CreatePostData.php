<?php

declare(strict_types=1);

namespace App\Services\Post\Dto;

use Illuminate\Contracts\Validation\ValidatesWhenResolved;

class CreatePostData
{
    public function __construct(
        private readonly string $title,
        private readonly string $body,
    ) {
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
            'title' => $this->getTitle(),
            'body' => $this->getBody(),
        ];
    }

    public static function fromRequest(ValidatesWhenResolved $request): self
    {
        return self::fromArray($request->validated());
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            body: $data['body'],
        );
    }
}
