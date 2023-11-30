<?php

namespace Etore\User\Exception;

enum ErrorCode: int
{
    case UserNotFound = 1001;
    case MissingToken = 1002;

    public function getErrorMessage(): string
    {
        return match ($this) {
            static::UserNotFound => 'user not found',
            static::MissingToken => 'user token missing'
        };
    }

    public function getStatusCode(): int
    {
        return match ($this) {
            static::UserNotFound => 403,
            static::MissingToken => 400
        };
    }
}
