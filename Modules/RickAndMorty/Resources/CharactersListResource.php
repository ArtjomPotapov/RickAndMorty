<?php

namespace ThePotapov\Modules\RickAndMorty\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharactersListResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image_url' => $this->image,
            'url' => route('details', $this->id),
        ];
    }
}