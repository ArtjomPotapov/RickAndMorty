<?php

namespace ThePotapov\Modules\RickAndMorty\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use ThePotapov\Modules\RickAndMorty\Facades\PostApi;

class PublicApiController
{
    public function characters(Request $request): JsonResponse
    {
        $characters = PostApi::getAllCharacters(['page' => $request->page]);

        return response()->json($characters);
    }

    public function details(mixed $id): JsonResponse
    {
        $character_details = PostApi::getCharacterDetails((int) $id);

        return response()->json($character_details);
    }
}