<?php

namespace App\Rest\Transport;

interface TransportInterface
{
    public function request(string $method, string $url, array $options = []): mixed;
}
