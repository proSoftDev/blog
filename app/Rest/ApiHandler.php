<?php

declare(strict_types=1);

namespace App\Rest;

use App\Rest\Transport\Exceptions\JsonDecodeException;
use App\Rest\Transport\TransportInterface;

abstract class ApiHandler
{
    public function __construct(
        protected TransportInterface $transport
    ) {
    }

    /**
     * @throws JsonDecodeException
     */
    protected function parseResponse($response): mixed
    {
        $response = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonDecodeException('Json decode error, JSON_ERROR = '.json_last_error().', client error 400 Bad Request');
        }

        return $response;
    }
}
