<?php

namespace ThePotapov\Modules\RickAndMorty\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public static function invalidArgument(string $message): static
    {
        return new static($message);
    }

    public static function resourceNotFound(): static
    {
        return new static('Cannot be found');
    }

    public static function resourceUnavailable(): static
    {
        return new static('Rick and Morty API is unavailable');
    }
}