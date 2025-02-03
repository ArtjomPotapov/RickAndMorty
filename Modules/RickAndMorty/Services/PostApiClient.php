<?php

namespace ThePotapov\Modules\RickAndMorty\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\RequestOptions;
use stdClass;
use ThePotapov\Modules\RickAndMorty\Exceptions\NotFoundException;

class PostApiClient
{
    private Client $client;

    public function __construct(private ApiSettings $api_settings)
    {
        $this->client = new Client(['verify' => false]);
    }

    public function get(string $endpoint, array $options = []): stdClass
    {
        $response = $this->sendRequest(method: 'GET', endpoint: $endpoint, options: $options);

        return json_decode($response);
    }

    private function sendRequest(string $method = 'GET', string $endpoint, array $options = [])
    {
        try {
            $response = $this->client->request(
                $method,
                $this->getEndPointUrl($endpoint),
                [
                    strtoupper($method) === 'POST' ? RequestOptions::FORM_PARAMS : RequestOptions::QUERY => $options
                ]
            );

            return $response->getBody();
        } catch (ClientException $e) {
            throw NotFoundException::resourceNotFound();
        } catch (ServerException $e) {
            throw NotFoundException::resourceUnavailable();
        } catch (GuzzleException $e) {
            throw NotFoundException::invalidArgument($e->getMessage());
        }
    }

    private function getEndPointUrl(string $endpoint): string
    {
        return $this->api_settings->api_base_url . $endpoint;
    }
}