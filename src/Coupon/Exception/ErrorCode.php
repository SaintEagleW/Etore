<?php

namespace Etore\Coupon\Exception;

enum ErrorCode: int
{
    case UserNotFound = 1001;
    case MissingRequiredData = 1002;

    public function getErrorMessage(): string
    {
        return match ($this) {
            static::UserNotFound => 'user not found',
            static::MissingRequiredData => 'required data missing'
        };
    }

    public function getStatusCode(): int
    {
        return match ($this) {
            static::UserNotFound => 403,
            static::MissingRequiredData => 400
        };
    }
}
