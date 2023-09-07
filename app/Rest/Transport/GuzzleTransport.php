<?php

namespace App\Rest\Transport;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleTransport implements TransportInterface
{
    public function __construct(
        protected Client $client
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $method, string $url, array $options = []): string
    {
        try {
            $response = $this->client->request($method, $url, $options)->getBody()->getContents();
        } catch (ClientException|BadResponseException $exception) {
            $response = $exception->getResponse()->getBody()->getContents() ?? $exception->getMessage();
        } catch (Exception $exception) {
            $response = $exception->getMessage();
        }

        return $response;
    }
}
