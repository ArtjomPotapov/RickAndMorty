<?php

namespace ThePotapov\Modules\RickAndMorty\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use ThePotapov\Modules\RickAndMorty\Resources\CharactersListResource;
use ThePotapov\Modules\RickAndMorty\Resources\CharactersResource;

class PostService
{
    public function __construct(private PostApiClient $api_client)
    {}

    public function getAllCharacters(array $options): AnonymousResourceCollection
    {
        $response = $this->api_client->get(endpoint: 'character', options: $options);

        return CharactersListResource::collection(collect($response->results));
    }

    public function getCharacterDetails(int $id)
    {
        $response = $this->api_client->get(endpoint: 'character' . '/' . $id);

        return CharactersResource::make($response);
    }
}