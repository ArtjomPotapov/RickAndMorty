<?php

namespace ThePotapov\Modules\RickAndMorty\Services;

class ApiSettings
{
    public function __construct(
        public string|null $api_base_url,
    ) {}
}