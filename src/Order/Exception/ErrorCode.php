<?php

namespace Etore\Order\Exception;

enum ErrorCode: int
{
    case UserNotFound = 1001;
    case MissingRequiredData = 1002;
        // case MissingToken = 1002;
    case MissingOrderId = 1003;
    case OrderNotFound = 1004;

    public function getErrorMessage(): string
    {
        return match ($this) {
            self::UserNotFound => 'user not found',
            self::MissingRequiredData => 'missing required data',
            self::MissingOrderId => 'orderId missing',
            self::OrderNotFound => 'order not found'
        };
    }

    public function getStatusCode(): int
    {
        return match ($this) {
            self::UserNotFound => 403,
            self::MissingRequiredData => 400,
            self::MissingOrderId => 400,
            self::OrderNotFound => 403
        };
    }
}
