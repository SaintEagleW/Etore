<?php

namespace Etore\Commodity\UseCases\GetCommodity;

use Etore\Utils\DataValidator;
use Etore\Commodity\Exception\ErrorCode;
use Etore\Commodity\Exception\CommodityException;

class Request
{
    private const SCHEMA = [
        'commodityId' => 'bail|required|int'
    ];

    private int $commodityId;

    public function __construct(array $data)
    {
        $this->validate($data);
        $this->format($data);
    }

    private function validate(array $data): void
    {
        $validator = new DataValidator();

        if (!$validator->isPass($data, self::SCHEMA)) {
            throw new CommodityException(ErrorCode::MissingCommodityId);
        }
    }

    private function format(array $data): void
    {
        $this->commodityId = $data['commodityId'];
    }

    public function getCommodityId(): int
    {
        return $this->commodityId;
    }
}
