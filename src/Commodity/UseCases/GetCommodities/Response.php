<?php

namespace Etore\Commodity\UseCases\GetCommodities;

use Etore\Commodity\Entities\Commodity;

class response
{
    private array $commodities;

    public function __construct(array $commodities)
    {
        $this->commodities = $commodities;
    }

    public function format(): array
    {
        return [
            'data' => array_map(function (Commodity $commodity) {
                return [
                    'id' => $commodity->getId(),
                    'price' => $commodity->getPrice(),
                    'title' => $commodity->getTitle(),
                    'description' => $commodity->getDescription(),
                    'imageUrl' => $commodity->getImageUrl()
                ];
            }, $this->commodities)
        ];
    }
}
