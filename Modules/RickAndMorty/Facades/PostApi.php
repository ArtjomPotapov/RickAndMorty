<?php

namespace ThePotapov\Modules\RickAndMorty\Facades;

use Illuminate\Support\Facades\Facade;

class PostApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PostApi';
    }
}