<?php

namespace ThePotapov\Modules\RickAndMorty\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharactersResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'species' => $this->species,
            'gender' => $this->gender,
            'origin' => $this->origin->name,
            'location' => $this->location->name,
            'episodes' => count($this->episode),
            'image_url' => $this->image,
        ];
    }
}