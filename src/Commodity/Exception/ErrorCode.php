<?php

namespace Etore\Commodity\Exception;

enum ErrorCode: int
{
    case MissingCommodityId = 1005;
    case CommodityNotFound = 1006;

    public function getErrorMessage(): string
    {
        return match ($this) {
            self::MissingCommodityId => 'product Id missing',
            self::CommodityNotFound => 'product not found'
        };
    }

    public function getStatusCode(): int
    {
        return match ($this) {
            self::MissingCommodityId => 400,
            self::CommodityNotFound => 404
        };
    }
}
